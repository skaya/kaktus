<?php

$top_menue = GetChild(0);

function GetChild($id) {
	global $DB;
	$a = array();

	$selected_rows = $DB->query("SELECT id, menue, title, icon, link, descr_page, link, parent_id, data_album FROM pages WHERE parent_id=".$id." and active=1 and (link='portfolio.php' or top=1) order by rank DESC");
	print mysql_error();


	while ($val = $selected_rows -> fetch_assoc()) {
		$g=GetChild($val['id']);


		$image =$DB->query("select pictures.id from pictures left join pictures_to_pages on pictures.id = pictures_to_pages.obj_id where pictures_to_pages.page_id=".$val['id']);
		$count = mysqli_num_rows($image);

		array_push($a, array("id"=>$val['id'],"menue"=>$val['menue'],"descr_page"=>$val['descr_page'],"data_album"=>$val['data_album'],"active"=>$val['active'],"link"=>$val['link'],"url"=>$val['url'],"icon"=>$val['icon'],"icon_sm"=>$val['icon_sm'],"parent_id"=>$val['parent_id'],"count"=>$count,"array"=>$g));
	}

	return $a;
}

$smarty->assign('drop_down_menu', $top_menue);
$smarty->assign('drop_down_menu', $smarty->fetch('scrollable_dropdown_menu.tpl'));

?>
