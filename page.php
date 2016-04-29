<?php

require("common/common_scripts.php");

function select_connected($what,$id,$params_to_select,$condition)
{
	global $DB, $admin, $lang, $obj_on_page, $all_obj_num;
	foreach ($id as $key => $value)
	{
		$str.="  ?_".$what."_to_pages.page_id='".$value."'
		or";
	}
	$str=substr($str,0,-2);

	if(!isset($_GET['page'])||$_GET['page']=='')
	{
		$start=0;
	}else{
		$start=($_GET['page']-1)*$admin['objects_num'];
	}
	$obj=$DB->selectPage($totalRows,"Select ".$params_to_select." from ?_".$what."
						 left join ?_".$what."_to_pages on
						 ?_".$what.".id=?_".$what."_to_pages.obj_id where (".$str.")
						".$condition."
						order by ?_".$what."_to_pages.rank LIMIT ?d, ?d",
						$start,$admin[$what.'_num']);
	return $obj;
}


function select_children ($id,$for_what)
{
	global $children,$db_prefics,$DB;
	$child_line = $DB->selectCol("Select id, ? from ?_pages where parent_id=? order by rank",$for_what,$id);
	if (is_array($child_line))
	{
		$children=array_merge($children,$child_line);
		foreach ($child_line as $key => $value)
		{
			if($value[$for_what]==1)
			{
				select_children ($value,$for_what);
			}
		}
	}
	return $children;

}


function select_items_for_group($what,$value)
{
	$params_to_select=$what.'_params_to_select';
	$condition=$what.'_condition';
	global $garmoshka_set,$children,$all_parent_pageids,$$params_to_select,$$condition;
	if(array_key_exists($what,$garmoshka_set['page']))
	{
		if($value[$what.'_recursive']==1)
		{
			$children=array();
			$all_parent_pageids=array();
			$all_parent_pageids[]=$value['id'];
			$all_parent_pageids=select_children($value['id'],$what.'_recursive');
		}
		else
		{
			$children=array();
			$all_parent_pageids=array();
			$all_parent_pageids[]=$value['id'];
		}
		return select_connected($what,$all_parent_pageids,$$params_to_select,$$condition);
	}
}

include("common/page_content.php");


if ($_REQUEST['portfolio_page']) {
	$smarty->assign('page', $page);
	$image =$DB->select("select ?_pictures.id,?_pictures.picture_origin,?_pictures.picture,?_pictures.picture_sm, ?_pictures.name_ru, ?_pictures_to_pages.rank from ?_pictures left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id where ?_pictures_to_pages.page_id=? order by ?_pictures_to_pages.rank",$_REQUEST['issue_id']);

	$smarty->assign('photo',$image);
	//$smarty->assign('gallery', $smarty->fetch('gallery.tpl'));
	require("common/common_end_scripts.php");
	$smarty->display('gallery.tpl');
} else {

	$pictures_params_to_select=" ?_pictures.id,?_pictures.picture_sm, ?_pictures.picture,
							 ".get_current_lang('name')." as name ";
	$pictures_condition="and  ?_pictures.picture_sm!='' ";
	$smarty->assign('pictures',select_items_for_group('pictures',$page));


	$files_params_to_select=" ?_files.id,?_files.file,
							 ".get_current_lang('name')." as name ";
	$pictures_condition="";
	$smarty->assign('files',select_items_for_group('files',$page));

	/* èíôîðìàöèÿ î âëîæåííûõ ãðóïïàõ */
	if(array_key_exists('is_group',$parameters['pages']))
	{
		foreach ($parameters['pages'] as $key => $value) {
			$str.=$value['name']." ,";
			}
		$my_groups=$DB->select("SELECT id, ".$str." ?# as title,?# as menue,?# as text,icon, icon_sm   FROM ?_pages WHERE parent_id = ? and is_group=1 and active=1",get_current_lang('title'), get_current_lang('menue'), get_current_lang('text'),$page['id']);
		foreach ($my_groups as $key => $value)
		{
			$my_groups[$key]['objects']=select_items_for_group('objects',$value);
			$my_groups[$key]['pictures']=select_items_for_group('pictures',$value);
			$my_groups[$key]['files']=select_items_for_group('files',$value);
		}

		$smarty->assign('my_groups',$my_groups);
	}

	if(array_key_exists('gall_page',$parameters['pages']))
	$id_gall=$DB->select("SELECT id FROM ?_pages WHERE gall_page=1");

	$gall_pages=$DB->select("SELECT id, ?# as title,?# as menue,?# as text,icon, icon_sm   FROM ?_pages WHERE parent_id = ?",get_current_lang('title'), get_current_lang('menue'), get_current_lang('text'),$id_gall[0]['id']);
	foreach ($gall_pages as $key => $value)
		{
			$gall_pages[$key]['pictures']=select_items_for_group('pictures',$value);
		}
	$smarty->assign('gall_pages',$gall_pages);

	$smarty->assign('gall_id',$id_gall[0]['id']);
	//if ($id_gall[0]["id"] == 1673) var_dump($id_gall[0]["id"]);
	/* êîíåö èíôîðìàöèè î âëîæåííûõ ãðóïïàõ */
	//var_dump($gall_pages);


	$smarty->assign('page', $page);

	//$smarty->assign('content',$smarty->fetch('catalog.tpl'));
	require("contact.php");

	require("common/common_end_scripts.php");

	$smarty->display('page.tpl');
}
?>