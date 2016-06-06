<?php

require("common/common_scripts.php");


if (isset($_REQUEST['issue_id']) && $_REQUEST['issue_id'] != '') {
	$page_row = $DB->query("SELECT id, title, content, parent_id, icon, menue, main, active FROM pages WHERE id=".$_REQUEST['issue_id']." and active=1");
} else {
	// show main page content
	$page_row = $DB->query("SELECT id, title, content, parent_id, icon, menue, main, active FROM pages WHERE main=1 and active=1");
}

$page = $page_row -> fetch_assoc();

$smarty->assign('page', $page);
$smarty->assign('title', $page['title']);
$smarty->assign('text', $page['content']);
$parent_id=$page['parent_id'];

require("common/selected_menue.php");
require("common/drop_down_menue.php");
$smarty->display('page.tpl');




?>
