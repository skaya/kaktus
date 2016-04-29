<?php

$page_types_query=$DB->selectCell("SELECT value FROM ?_settings WHERE name=?",'page_types');
$page_types_select=explode("|",$page_types_query);
$page_types=array();
foreach ($page_types_select as $key => $value) {
		$row=explode(':',$value);
		$page_types[]=array('name'=>$row[0],'link'=>$row[1]);
	}
$smarty->assign('page_types',$page_types);	


?>