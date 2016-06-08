<?
$rows=$DB->query("SELECT menue, title, id, link, parent_id FROM pages WHERE left_m=1 and active=1 order by rank");
$selected_menue=array();

while ($row = $rows -> fetch_assoc()) {
   array_push($selected_menue, $row);
}

$smarty->assign('article_menu',$selected_menue);
$smarty->assign('article_menu',$smarty->fetch('article_menu.tpl'));
?>
