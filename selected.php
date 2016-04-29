<?php
require("common/common_scripts.php");
function selected_objects()
	{
		global $DB, $admin, $objects, $lang, $from,  $obj_on_page, $all_obj_num,$parameters;
		
	foreach ($parameters['objects'] as $key => $value) {
		$select[]=$value['name'];
	}

	$str=substr($str,0,-2);
	if(!isset($_GET['page'])||$_GET['page']=='')
	{$start=0;}else{
	$start=($_GET['page']-1)*$admin['objects_num'];}
	
	$objects=$DB->selectPage($totalRows,"Select  ?#, ?_objects.id,?_objects.time, 
						 ?# as title, ?_objects.icon_sm, 
						 ?# as short_descr,
						 ?# as long_descr from ?_objects 
						 where selected=1 and ?_objects.active=1
						order by ?_objects.rank LIMIT ?d, ?d",
						$select, get_current_lang('title') ,get_current_lang('short_descr'),get_current_lang('long_descr'),
						$start,$admin['objects_num']);		
		return $objects;	
	}
	
include("common/page_content.php");

$objects=selected_objects();
$smarty->assign('objects',$objects);
$smarty->assign('content',$smarty->fetch('catalog.tpl'));

require("common/common_end_scripts.php");
?>