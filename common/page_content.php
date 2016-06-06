<?php

if (isset($_REQUEST['issue_id']) && $_REQUEST['issue_id'] != '') {
	$page_row = $DB->query("SELECT * FROM pages WHERE id=".$_REQUEST['issue_id']." and active=1");
} else {
	// show main page content
	$page_row = $DB->query("SELECT * FROM pages WHERE main=1 and active=1");
}

$page = $page_row -> fetch_assoc();

$smarty->assign('page', $page);
$smarty->assign('title', $page['title']);
$smarty->assign('content', $page['text']);
$parent_id=$page['parent_id'];

require("selected_menue.php");
require("drop_down_menue.php");


if ($_REQUEST['portfolio_page']) {

// 	$images = $db->query("select * from pictures left join pictures_to_pages on pictures.id = pictures_to_pages.obj_id where pictures_to_pages.page_id=? order by pictures_to_pages.rank", $_REQUEST['issue_id']);
// 	$image_rows = $image -> fetch_assoc()
// 	$smarty->assign('photo', $image_rows);

// 	$smarty->display('gallery.tpl');
} else {
	var_dump('sasa');

// 	$pictures_params_to_select=" ?_pictures.id,?_pictures.picture_sm, ?_pictures.picture,
// 							 ".get_current_lang('name')." as name ";
// 	$pictures_condition="and  ?_pictures.picture_sm!='' ";
// 	$smarty->assign('pictures',select_items_for_group('pictures',$page));




// 	if(array_key_exists('is_group',$parameters['pages'])) {
// 		foreach ($parameters['pages'] as $key => $value) {
// 			$str.=$value['name']." ,";
// 			}
// 		$my_groups=$DB->select("SELECT id, ".$str." ?# as title,?# as menue,?# as text,icon, icon_sm   FROM ?_pages WHERE parent_id = ? and is_group=1 and active=1",get_current_lang('title'), get_current_lang('menue'), get_current_lang('text'),$page['id']);
// 		foreach ($my_groups as $key => $value) {
// 			$my_groups[$key]['objects']=select_items_for_group('objects',$value);
// 			$my_groups[$key]['pictures']=select_items_for_group('pictures',$value);
// 			$my_groups[$key]['files']=select_items_for_group('files',$value);
// 		}

// 		$smarty->assign('my_groups',$my_groups);
// 	}

// 	if(array_key_exists('gall_page',$parameters['pages']))
// 	$id_gall=$DB->select("SELECT id FROM ?_pages WHERE gall_page=1");

// 	$gall_pages=$DB->select("SELECT id, ?# as title,?# as menue,?# as text,icon, icon_sm   FROM ?_pages WHERE parent_id = ?",get_current_lang('title'), get_current_lang('menue'), get_current_lang('text'),$id_gall[0]['id']);
// 	foreach ($gall_pages as $key => $value) {
// 		$gall_pages[$key]['pictures']=select_items_for_group('pictures',$value);
// 	}

// 	$smarty->assign('gall_pages',$gall_pages);
// 	$smarty->assign('gall_id',$id_gall[0]['id']);


	$smarty->assign('page', $page);

 	$smarty->assign('content',$smarty->fetch('catalog.tpl'));
	require("contact.php");

 	$smarty->display('page.tpl');
 	$smarty->error_reporting = E_ALL & ~E_NOTICE;
}


?>
