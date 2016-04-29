<?
	header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");                        // HTTP/1.0
	require("common/connect_templates.php");
	//save selected page/section
	if ($_REQUEST['action']=="save_page") {
		require("common/savePage.php");
		$link=saveData();
		header("location:saved.php?issue_id=".$_REQUEST['issue_id']."&link_to=".$link);
		exit();
	}

	$select=array('id');
	$select=array_merge($select,get_langs('menue'), get_langs('title'), get_langs('text'));//подготовка полей, которые отличаются в разных языковых версиях

	// function updatePicList() {
	// 	var_dump($_GET['issue_id']);
	// 	$pics = $DB->select("Select ?_pictures.id,?_pictures.picture_sm, ?_pictures.name_ru,?_pictures_to_pages.id as link_id from ?_pictures
	// 		left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id
	// 		where
	// 		?_pictures_to_pages.page_id=?
	// 		 order by ?_pictures.rank", $_GET['issue_id']);
	// 	var_dump($pics);
	// 	$smarty->assign('pics',$pics);
	// 	$smarty->assign('issue_id',$_GET['issue_id']);
	// 	$smarty->display('pictures.tpl');
	// }

		/*--ajaxed part--*/
function refresher(){
	global $smarty,$DB,$langs;
	$page =$DB->selectRow("SELECT ?# FROM ?_pages WHERE active=1 and id=?", get_langs('menue'),$_GET['id']);
	foreach ($page as $key => $value) {
		foreach ($langs as $k => $v) {
			if($page['menue_'.$v]!='') {
				$page['menue']=$page['menue_'.$v];
				break;
			}
		}
	}
	$smarty->assign('page',$page);
	$smarty->display('name.tpl');
}

function ierarch_up(){
	global $smarty,$DB,$langs;
	$now_parent=$DB->selectCell("SELECT parent_id FROM ?_pages WHERE  id=?", $_GET['id']);
	$new_parent =$DB->selectCell("SELECT parent_id FROM ?_pages WHERE  id=?", $now_parent);
	$DB->query("update ?_pages set parent_id=? WHERE  id=?", $new_parent, $_GET['id']);
	$_GET['id']=$new_parent;
	select_subtree();
}

if ($_REQUEST['issue_id']) {
	global $smarty;
	$a = GetChild(0);

}

function select_subtree() {
  global $smarty;
  $a = GetChild($_GET['id']);
  $smarty->display('tree.tpl');
}

function delete_page() {
	global $smarty,  $DB;
	$parent =$DB->selectCell("SELECT parent_id FROM ?_pages WHERE id=?",$_GET['issue_id']);
	$all_children=selectChildRecursive($_GET['issue_id']);
	$all_children[]=$_GET['issue_id'];
	$DB->query("delete FROM ?_pages WHERE id IN(?a)",$all_children);
	//need to delete pics and objects TO_EDIT
	$a = GetChild($parent);
}


function change_rank() {
	global $smarty,  $DB;
	$me =$DB->selectRow("SELECT parent_id,id,rank FROM ?_pages WHERE id=?",$_GET['id']);

	if ( isset($_GET['how']) && $_GET['how'] == "up" ) {
		$neibor=$DB->selectRow("SELECT rank,id FROM ?_pages WHERE parent_id=".$me['parent_id']." and rank<".$me['rank']." ORDER BY rank desc limit 1");
	} else if (isset($_GET['how']) && $_GET['how'] == "down") {
		$neibor=$DB->selectRow("SELECT rank,id FROM ?_pages WHERE parent_id=".$me['parent_id']." and rank>".$me['rank']."  ORDER BY rank asc limit 1");
	}

	if (isset($neibor)&&isset($neibor['rank'])&&isset($me['rank']) && ($neibor['rank'] != $me['rank'])) {
		$DB->query("UPDATE ?_pages SET rank=".$neibor['rank']." WHERE id = ".$me['id']);
		$DB->query("UPDATE  ?_pages SET rank=".$me['rank']." WHERE id = ".$neibor['id']);
	}

  $a = GetChild($me['parent_id']);
}

/*--ajaxed part end--*/

/*--help functions--*/
function selectChildRecursive($id){
	global $DB, $db_prefics, $all_children;
	$children=$DB->selectCol("SELECT id FROM ?_pages WHERE parent_id=? and active=1",$id);
	foreach ($children as $key => $value) {
		$all_children[]=$value;
		selectChildRecursive($value);
	}
	return $all_children;
}

function checkChild($id) {
	global $DB, $db_prefics;
	$child = $DB->selectCol("SELECT id FROM ?_pages WHERE parent_id=? and active=1",$id);
	return $child;
}

function GetChild($id) {
	global $DB, $db_prefics, $parents,$smarty,$langs;
	$a = array();
	$select=array('id','parent_id','link','is_shown');//подготовка полей для выборки
	$select=array_merge($select, get_langs('menue'));//подготовка полей, которые отличаются в разных языковых версиях
	$rst = $DB->select("SELECT ?# FROM ?_pages WHERE parent_id=? and active=1 order by rank desc",$select,$id);

	foreach ($rst as $key => $value) {
	  if (count(checkChild($value['id']))>0) {
			$value['sub']=1;
		}
		$value['parent_parent_id']= $DB->selectCell("SELECT parent_id FROM ?_pages WHERE id=? and active=1 order by rank desc",$value['parent_id']);
		foreach ($langs as $k => $v) {
			if($value['menue_'.$v]!='') {
				$value['menue']=$value['menue_'.$v];
				break;
			}
		}

		array_push($a, array("id"=>$value['id'],"menue"=>$value['menue'],"link"=>$value['link'],"is_shown"=>$value['is_shown'],"parent_id"=>$value['parent_id'],"parent_parent_id"=>$value['parent_parent_id'],"display"=>"none","sub"=>$value['sub']));
	}

	$smarty->assign('a',$a);
	//var_dump($a);
	$smarty->assign('level',"tree_".$id);

}
/*--help functions end--*/

	function pic_edit() {
		global $smarty, $root_abs, $DB;
		$name =$DB->selectRow("SELECT ?# ,id FROM ?_pictures WHERE id=?",get_langs('name'),$_GET['pic_id']);
		$smarty->assign('name',$name);
		$smarty->assign('table',$_GET['table']);
		$smarty->display('pic_fields.tpl');
	}

	function delete_pic() {
		global $smarty, $root_abs, $DB;

		$pic =$DB->selectRow(
		"SELECT * FROM ?_pictures  WHERE id=?",$_GET['id']);
		/* TO EDIT */
		@unlink($root_abs.$pic['picture']);
		@unlink($root_abs.$pic['picture_sm']);
		@unlink($root_abs.$pic['picture_big']);
		@unlink($root_abs.$pic['picture_origin']);
		$DB->query("delete FROM ?_pictures  WHERE id=?",$_GET['id']);
		$DB->query("delete FROM ?_pictures_to_pages  WHERE obj_id=?",$_GET['id']);

		$pics = $DB->select("Select ?_pictures.id,?_pictures.picture_sm, ?_pictures.name_ru,?_pictures_to_pages.id as link_id from ?_pictures
			left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id
			where
			?_pictures_to_pages.page_id=?
			 order by ?_pictures.rank", $_GET['issue_id']);

		$smarty->assign('pics',$pics);
		$smarty->assign('issue_id',$_GET['issue_id']);
		$smarty->display('pictures.tpl');
	}



	if ($_POST['update'] == "order"){
		$array	= $_POST['arrayorder'];
		$count = 1;
		foreach ($array as $idval) {
			$DB->query("UPDATE ?_pictures SET rank=".$count." WHERE id = ".$idval);
			$count ++;
		}
		echo 'Информация сохранена!';
		//$smarty->assign('issue_id',$_GET['issue_id']);
		//updatePicList();

	}

	//далее надо загружать бэкапные данные, если нам передали page_id
	if (isset($_REQUEST['page_id'])&&($_REQUEST['page_id']!='')) {

		$pages = $DB->selectRow("SELECT ?# FROM ?_pages WHERE page_id=?",$select,$_REQUEST['page_id']);
		//если редактируем версию, то показываем и предыдущие
		$select_me=array_merge(get_langs('menue'));//подготовка полей, которые отличаются в разных языковых версиях
		$data = $DB->select("SELECT ?_pages.page_id, ?_pages.id,login as author,time, ?#  FROM ?_pages left join ?_users on ?_users.id=?_pages.author WHERE ?_pages.id=? order by time desc", $select_me,$pages['id']);
		$smarty->assign('data',$data);
		$smarty->assign('show_tpl','versions');
	} else if(isset($_REQUEST['issue_id'])&&($_REQUEST['issue_id']!='')) {

		$pages = $DB->selectRow("SELECT ?# FROM ?_pages WHERE active=1 and id=?",$select, $_REQUEST['issue_id']);


	}



	//if ($_POST['update'] == "picList"){
		//updatePicList();
		// $pics = $DB->select("Select ?_pictures.id,?_pictures.picture_sm, ?_pictures.name_ru,?_pictures_to_pages.id as link_id from ?_pictures
		// 	left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id
		// 	where
		// 	?_pictures_to_pages.page_id=?
		// 	 order by ?_pictures.rank", $_GET['issue_id']);
		// $smarty->assign('pics',$pics);
		// $smarty->assign('issue_id',$_GET['issue_id']);
		// $smarty->display('pictures.tpl');
	//}

	$smarty->assign('issue_id',$pages['id']);
	$smarty->assign('pages',$pages);

	$pics = $DB->select("Select ?_pictures.id,?_pictures.picture_sm, ?_pictures.name_ru,?_pictures_to_pages.id as link_id from ?_pictures
			left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id
			where
			?_pictures_to_pages.page_id=?
			 order by ?_pictures.rank", $_REQUEST['issue_id']);

	$smarty->assign('pics',$pics);

	$smarty->assign("page_text",stripslashes($pages["text_ru"]));
	$smarty->assign('garmoshka_set',$garmoshka_set['page']);
	$smarty->assign('garmoshka_set_name','page');
	$smarty->assign('left',$smarty->fetch('tree_end.tpl'));
	$smarty->assign('issue_id',$_POST['issue_id']);

	if ($_POST['update'] != "picList") {
		$smarty->assign('garmoshka',$smarty->fetch('garmoshka.tpl'));
		$smarty->display('page.tpl');
	} else {
		$smarty->assign('issue_id',$_POST['issue_id']);
		$smarty->display('pictures.tpl');
	}


?>
