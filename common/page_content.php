<?php
foreach ($parameters['pages'] as $key => $value) {
		$str.="`".$value['name']."` ,";
}
if(array_key_exists('map_page',$garmoshka_set['page'])){
	$str.="`show_map` ,`zoom` ,`lat` ,`long` ,`map_type`,";
};
if(array_key_exists('icon',$garmoshka_set['page'])){
	$str.="`icon` ,`icon_sm`, ";
};

if ( isset($_REQUEST['issue_id']) && $_REQUEST['issue_id'] != '')
{
	$page=$DB->selectRow("SELECT `id`, ".$str." ?# as `title`,?# as `menue`,?# as `text`, link, url, meta_descr_ru as 'meta_descr', keywords_ru as 'keywords' 
	FROM ?_pages WHERE `id` = ? and `active`=1",get_current_lang('title'), 
	get_current_lang('menue'), get_current_lang('text'),$_REQUEST['issue_id']);
	
}
else  
{
	// show main page content	
	$page =$DB->selectRow("SELECT `id`, ".$str." ?# as `title`,?# as `menue`,?# as `text`  FROM ?_pages WHERE `main`=1 and `active`=1",get_current_lang('title'), get_current_lang('menue'), get_current_lang('text'));
}
$smarty->assign('title', $page['title']);
$smarty->assign('content', $page['text']);
$parent_id=$page['parent_id'];

/*if ($page['main']==1)
{
	require ("common_news.php");
}*/
?>