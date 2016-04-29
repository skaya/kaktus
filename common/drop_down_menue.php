<?
function get_active($id)
{global $DB, $smarty, $actives;
	array_push($actives,$id);
	if($id!=0)
	{
		 get_active($DB->selectCell("SELECT parent_id FROM ?_pages WHERE id=?  and active=1",$id));
		}

}
$actives=array();
get_active($_REQUEST['issue_id']);
//var_dump($actives);
function GetChild($id) {
global $DB, $smarty, $points, $actives;
$a = array();
$selected = $DB->select("SELECT id,?# as menue,?# as title,icon,icon_sm,url,descr_page,link,parent_id,data_album FROM ?_pages WHERE parent_id=? and is_shown=1 and active=1 order by rank DESC",get_current_lang('menue'),get_current_lang('title'),$id);

while (list ($key, $val) = each ($selected)) {
$g=GetChild($val['id']);


		  if(in_array($val['id'],$actives))
		  {
		 $val['active']=1;

		  }
//$val['icon_sm']=str_replace('big','origin',$val['icon']);
$kol = '';
$image =$DB->select("select ?_pictures.id from ?_pictures left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id where ?_pictures_to_pages.page_id=?",$val['id']);


foreach ($image as $key => $value) {
	$kol = count($image);
}

array_push($a, array("id"=>$val['id'],"menue"=>$val['menue'],"descr_page"=>$val['descr_page'],"data_album"=>$val['data_album'],"active"=>$val['active'],"link"=>$val['link'],"url"=>$val['url'],"icon"=>$val['icon'],"icon_sm"=>$val['icon_sm'],"parent_id"=>$val['parent_id'],"kol"=>$kol,"array"=>$g));
}
return $a;
}

$id = 0;
$top_menue = GetChild($id,'0');
//var_dump($top_menue);
$smarty->assign('top_menue',$top_menue);
$smarty->assign('drop_down_menue',$smarty->fetch('drop_down_menue.tpl'));
?>
