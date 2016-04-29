<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0

require("common/connect_templates.php");
require("common/dateFormats.php");
//save selected page/section
if ($_REQUEST['action']=="save_page") {
	require("common/savePage.php");
	saveData();
	header("location:saved.php?issue_id=".$_REQUEST['issue_id']);
	exit();
}
else if($_REQUEST['action']=="delete_news")
{
	$DB->query("DELETE FROM ?_news  WHERE  id=?", $_REQUEST['id']);	
	$DB->query("DELETE FROM ?_news_to_pages  WHERE  obj_id=?", $_REQUEST['id']);
	header("location:all_news.php");
	exit();
	}
	
	$news = $DB->select("SELECT * FROM ?_news left join ?_news_to_pages on ?_news.id=?_news_to_pages.obj_id WHERE  active=1 ORDER BY start_date DESC");	
	foreach ($news  as $key => $value) {
		$value['date'] = getNorm_date($value['start_date'],$value['end_date'],$value['show_as']);
	}
	$smarty->assign('news', $news);		

	//набор кнопок в гармошке
	$smarty->assign('both',$smarty->fetch('all_news.tpl'));
	$smarty->assign('cur_page', 'news');
	$smarty->display('main.tpl');	
?>