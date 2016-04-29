<?
$selected_menue=$DB->select("SELECT ?# as menue,?# as title,id,link,symlink,parent_id FROM ?_pages WHERE left_m=1 and active=1 order by rank",get_current_lang('menue'),get_current_lang('title'));
$smarty->assign('selected_menue',$selected_menue);
$smarty->assign('selected_menue',$smarty->fetch('selected_menue.tpl'));
?>