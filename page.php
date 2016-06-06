<?php

require("common/common_scripts.php");

function select_connected($what, $id, $params_to_select, $condition) {
	global $DB, $admin, $lang, $obj_on_page, $all_obj_num;

	foreach ($id as $key => $value) {
		$str.="  ".$what."_to_pages.page_id='".$value."'
		or";
	}

	$str=substr($str,0,-2);

	if(!isset($_GET['page'])||$_GET['page']=='') {
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'];
	}
	$obj=$DB->selectPage($totalRows, "Select ".$params_to_select." from ".$what."
						 left join ".$what."_to_pages on
						 ".$what.".id = ".$what."_to_pages.obj_id where (".$str.")
						".$condition."
						order by ".$what."_to_pages.rank LIMIT ?d, ?d",
						$start, $admin[$what.'_num']);
	return $obj;
}


function select_children($id,$for_what) {
	global $children, $db_prefics, $DB;
	$child_line = $DB->selectCol("Select id, ? from pages where parent_id=? order by rank", $for_what, $id);
	if (is_array($child_line)) {
		$children=array_merge($children,$child_line);
		foreach ($child_line as $key => $value) {
			if($value[$for_what]==1) {
				select_children ($value,$for_what);
			}
		}
	}
	return $children;
}


function select_items_for_group($what,$value) {
	$params_to_select=$what.'_params_to_select';
	$condition=$what.'_condition';
	global $garmoshka_set,$children,$all_parent_pageids,$$params_to_select,$$condition;
	if(array_key_exists($what,$garmoshka_set['page'])) {
		if($value[$what.'_recursive']==1) {
			$children=array();
			$all_parent_pageids=array();
			$all_parent_pageids[]=$value['id'];
			$all_parent_pageids=select_children($value['id'],$what.'_recursive');
		} else {
			$children=array();
			$all_parent_pageids=array();
			$all_parent_pageids[]=$value['id'];
		}
		return select_connected($what,$all_parent_pageids,$$params_to_select,$$condition);
	}
}



include("common/page_content.php");

?>
