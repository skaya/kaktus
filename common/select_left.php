<?
	$left = array();
	$query_img = mysql_query("select id, icon, menue from ".$db_prefics."pages where is_left=1 or is_right=1 order by rank",$DB);
	print mysql_error();
	while ($row = mysql_fetch_assoc($query_img)) {
		$left[] = $row;
	}
	$smarty->assign('left',$left);


?>
