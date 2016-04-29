<?
require("common/connect_templates.php");
if ( $_REQUEST['action'] =="edit" ) {

	$extra=$DB->selectRow("SELECT * FROM ?_extra_texts WHERE id=?",$_REQUEST['issue_id']);	

if($extra['spaw']==1)
{
	/*include 'spaw/spaw_control.class.php';	
	$spaw = new SpawEditor("text_".$langs[0]);//первая закладка - первый в списке язык
	foreach ($langs as $key => $value) {//добавляем страницы с языками
		$spaw->addPage(new SpawEditorPage("text_".$value,"(".$value.")",stripslashes($extra["text_".$value])));
		
	}
	$smarty->assign("page_text",$spaw->getHtml());*/
	$smarty->assign("page_text",stripslashes($pages["text_ru"]));
}
	
	
	$smarty->assign('pages',$extra);
	$smarty->assign('content', $smarty->fetch('extra.tpl'));
}
if ( $_REQUEST['action'] =="save" ) {
	$DB->query("UPDATE  ?_extra_texts SET ?a WHERE id = ?",to_insert_lang('text',$_REQUEST,1),$_REQUEST['issue_id']);	
}

$list =  $DB->select("SELECT id, name, descr FROM ?_extra_texts");
$smarty->assign('list',$list);
$smarty->assign('left', $smarty->fetch('extras.tpl'));




$smarty->assign('cur_page','extras');
$smarty->display('main.tpl');


?>