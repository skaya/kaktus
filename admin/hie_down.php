<?
require("common/connect_templates.php");

if ($_REQUEST['action']=="ierarch_down") 
	{
	$section = $DB->select("SELECT id, ?# FROM ?_pages WHERE parent_id=? and active=1 and id not in (SELECT id FROM ?_pages WHERE id=?) ORDER BY menue_".$langs[0],get_langs('menue'),$_REQUEST['parent_id'],$_GET['issue_id']);	
	$smarty->assign('id',$_REQUEST['issue_id']);
	$smarty->assign('section',$section);
	$smarty->display('choose_section.tpl');
	}
else if ($_REQUEST['action']=="save")
	{
		$DB->query("UPDATE  ?_pages SET parent_id=? WHERE id = ?",$_REQUEST['parent_id'],$_REQUEST['issue_id']);	
		header("location:hie_saved.php?issue_id=".$_REQUEST['issue_id']);
		exit();
	}



?>