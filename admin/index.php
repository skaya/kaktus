<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0
require("common/connect_templates.php");

$smarty->assign('right','<iframe  name="frame" src="intro.html" FRAMEBORDER=NO FRAMESPACING=0 BORDER=0  height="100%" width="100%" id="iframe-content"></iframe>');
$smarty->assign('cur_page','main_pages');
$smarty->assign('messages', array('Добавление раздела / страницы'));
$smarty->assign('page_types',$page_types);
$smarty->assign('left',$smarty->fetch('tree_end.tpl'));
$smarty->assign('cur_page','main');
$smarty->display('main.tpl');


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

function select_subtree() {
  global $smarty;
  $a = GetChild($_GET['id']);
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
  $smarty->display('tree.tpl');
}
/*--help functions end--*/

?>
