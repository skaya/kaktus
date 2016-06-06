<?php
require("common/common_scripts.php");

if (isset($_REQUEST['issue_id']) && $_REQUEST['issue_id'] != '') {
  $page_row = $DB->query("SELECT id, title, content, parent_id, icon, menue, main, active FROM pages WHERE id=".$_REQUEST['issue_id']." and active=1");

  $image_row = $DB->query("select pictures.id, pictures.picture_origin, pictures.picture, pictures.picture_sm, pictures.name, pictures_to_pages.rank from pictures left join pictures_to_pages on pictures.id=pictures_to_pages.obj_id where pictures_to_pages.page_id=".$_REQUEST['issue_id']." order by pictures.rank");
}

$page = $page_row -> fetch_assoc();

$images=array();
while($image = $image_row -> fetch_assoc()) {
  array_push($images, $image);
}

$smarty->assign('page', $page);
$smarty->assign('photo', $images);

$smarty->display('gallery.tpl');
?>
