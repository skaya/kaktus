<?
$actives=array();

get_active($_REQUEST['issue_id']);

$top_menue = GetChild(0);

function get_active($id){
	global $DB, $actives;
	array_push($actives, $id);
	if($id!=0) {
		$rows = $DB->query("SELECT parent_id FROM pages WHERE id=".$id." and active=1");
	  get_active($rows -> fetch_assoc());
	}
}

function GetChild($id) {
	global $DB, $actives, $a;
	$a = array();

	$selected_rows = $DB->query("SELECT id, menue, title, icon, icon_sm, url, descr_page, link, parent_id, data_album FROM pages WHERE parent_id=".$id." and is_shown=1 and active=1 order by rank DESC");



	while ($val = $selected_rows -> fetch_assoc()) {
		$g=GetChild($val['id']);

		if(in_array($val['id'], $actives)) {
			$val['active']=1;
		}

		$kol = '';
		$image =$DB->query("select pictures.id from pictures left join pictures_to_pages on pictures.id = pictures_to_pages.obj_id where pictures_to_pages.page_id=".$val['id']);
		$count = $image -> fetch_assoc();

		foreach ($image as $key => $value) {
			$kol = count($image);
		}

		array_push($a, array("id"=>$val['id'],"menue"=>$val['menue'],"descr_page"=>$val['descr_page'],"data_album"=>$val['data_album'],"active"=>$val['active'],"link"=>$val['link'],"url"=>$val['url'],"icon"=>$val['icon'],"icon_sm"=>$val['icon_sm'],"parent_id"=>$val['parent_id'],"kol"=>$kol,"array"=>$g));
	}

	return $a;

}

$smarty->assign('top_menue', $top_menue);
$smarty->assign('drop_down_menue', $smarty->fetch('drop_down_menue.tpl'));
?>
