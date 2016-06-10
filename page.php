<?php

require("common/common.php");

if (isset($_REQUEST['issue_id']) && $_REQUEST['issue_id'] != '') {
	$page_row = $DB->query("SELECT id, title, content, parent_id, icon, menue, main, active FROM pages WHERE id=".$_REQUEST['issue_id']." and active=1");
} else { // show main page content
	$page_row = $DB->query("SELECT id, title, content, parent_id, icon, menue, main, active FROM pages WHERE main=1 and active=1");
}

$page = $page_row -> fetch_assoc();
$smarty->assign('page', $page);
$parent_id=$page['parent_id'];

$smarty->assign('contact_form',$smarty->fetch('contact_form.tpl'));
$smarty->display('page.tpl');
?>
