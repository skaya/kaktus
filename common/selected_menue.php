<?
$rows=$DB->query("SELECT menue, title, id, link, symlink, parent_id FROM pages WHERE left_m=1 and active=1 order by rank");
$selected_menue = $rows -> fetch_all();

$smarty->assign('selected_menue',$selected_menue);
$smarty->assign('selected_menue',$smarty->fetch('selected_menue.tpl'));
?>
