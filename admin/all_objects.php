<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0

require("common/connect_templates.php");
require("common/dateFormats.php");
//save selected page/section
function delete_object()
{/* TO EDIT */
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT icon,icon_sm  FROM ?_objects  WHERE id=?",$_GET['id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['icon']);
	@unlink($root_abs.$pic['icon_sm']);
	$DB->query("delete FROM ?_objects_to_pages  WHERE obj_id=?",$_GET['id']);
	$DB->query("delete FROM ?_objects  WHERE id=?",$_GET['id']);
	show_objects();
	$smarty->display('objects_list.tpl');
} 
function change_rank()
{
	global $smarty,  $DB;
	
	$me =$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE id=?",$_GET['id']);
	if ( isset($_GET['how']) && $_GET['how'] == "up" )
		{$neibor=$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE  rank<".$me['rank']." ORDER BY rank desc limit 1");
		
		}
	else if ( isset($_GET['how']) && $_GET['how'] == "down")
		{$neibor=$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE  rank>".$me['rank']." ORDER BY rank asc limit 1");
		}
	if (isset($neibor)&&isset($neibor['rank'])&&isset($me['rank']) && ($neibor['rank'] != $me['rank']))
	{	
		$DB->query("UPDATE ?_".$_GET['table']." SET rank=".$neibor['rank']." WHERE id = ".$me['id']);
		$DB->query("UPDATE  ?_".$_GET['table']." SET rank=".$me['rank']." WHERE id = ".$neibor['id']);			
	} 
	show_objects();
	$smarty->display('objects_list.tpl');
}

function show_objects(){
	global $DB, $smarty,$admin,$langs;
	if(!isset($_GET['page'])||$_GET['page']=='')
{$start=0;}
else{$start=($_GET['page']-1)*$admin['objects_num'] ;}
$data = $DB->selectPage(
  $totalRows,
  "Select ?_objects.id,rank,?# from ?_objects 
		where 
		 ?_objects.active='1' 
		order by ?_objects.rank LIMIT ?d, ?d",
  get_langs('title'),$start,$admin['objects_num']
);

$pages_num=ceil($totalRows/$admin['objects_num']);
$smarty->assign('pages_num',$pages_num);
$smarty->assign('objects',$data);		

	
}


if ($_REQUEST['action']=="save_page") {
	require("common/savePage.php");
	saveData();
	header("location:saved.php?issue_id=".$_REQUEST['issue_id']);
	exit();
}

show_objects();
$smarty->assign('both',$smarty->fetch('all_objects.tpl'));
	$smarty->assign('cur_page', 'objects');
	$smarty->display('main.tpl');	
?>