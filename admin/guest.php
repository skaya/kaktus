<?
require("common/connect_templates.php");

if ($_REQUEST['action'] == 'open') {
	mysql_query("update ".$db_prefics."guest set is_show=1 where id=".$_REQUEST['id'],$DB);
	print mysql_error();
}

if ($_REQUEST['action'] == 'close') {
	mysql_query("update ".$db_prefics."guest set is_show=0 where id=".$_REQUEST['id'],$DB);
	print mysql_error();
}

if ($_REQUEST['action'] == 'edit') {
	$guest_edit = mysql_fetch_assoc(mysql_query("select * from ".$db_prefics."guest where id=".$_REQUEST['id'],$DB));
	print mysql_error();
	$smarty->assign('guest_edit',$guest_edit);
}

if ($_REQUEST['action'] == 'save') {
	mysql_query("update ".$db_prefics."guest set name='".$_REQUEST['name']."', email='".$_REQUEST['email']."', text='".$_REQUEST['text']."', answer='".$_REQUEST['answer']."' where id=".$_REQUEST['id'],$DB);
	print mysql_error();
}

if ($_REQUEST['action'] == 'delete') {
	mysql_query("delete FROM ".$db_prefics."guest where id=".$_REQUEST['id'],$DB);
	print mysql_error();
}

$guest = $DB->select("select * from ?_guest order by is_show",$DB);

$smarty->assign('guest',$guest);
$smarty->assign('both',$smarty->fetch('guest.tpl'));
$smarty->display('main.tpl');
?>