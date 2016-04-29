<?php
require("common/connect_templates.php");
$data=$DB->selectRow("select * from ?_instructions where name='selected'");
$smarty->assign('data',$data);
if(!isset($_GET['page'])||$_GET['page']=='') {
	$start=0;
} else {
	$start=$_GET['page']-1;
}
$objects=$DB->selectPage($totalRows,"select * from ?_objects where selected=1 order by rank LIMIT ?d, ?d",$start,$admin['objects_num']);
$smarty->assign('objects',$objects);
$pages_num=ceil($totalRows/$admin['objects_num']);
$smarty->assign('pages_num',$pages_num);
		//набор кнопок в гармошке
$smarty->assign('garmoshka_set',$garmoshka_set['selected_obj']);
$smarty->assign('garmoshka_set_name','selected_obj');
$smarty->assign('garmoshka',$smarty->fetch('garmoshka.tpl')); 
$smarty->display('selected.tpl');	

?>