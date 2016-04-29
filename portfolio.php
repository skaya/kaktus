<?php
require("common/common_scripts.php");

include("common/page_content.php");

$smarty->assign('page', $page);
$image =$DB->select("select ?_pictures.id,?_pictures.picture_origin,?_pictures.picture,?_pictures.picture_sm, ?_pictures.name_ru, ?_pictures_to_pages.rank from ?_pictures left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id where ?_pictures_to_pages.page_id=? order by ?_pictures.rank",$_REQUEST['issue_id']);

$smarty->assign('photo',$image);
//$smarty->assign('gallery', $smarty->fetch('gallery.tpl'));
require("common/common_end_scripts.php");
$smarty->display('gallery.tpl');
?>
