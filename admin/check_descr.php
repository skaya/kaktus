<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0
require("common/connect_templates.php");

$insert=array();

$insert=array_merge($insert,to_insert_lang('meta_descr',$_POST,0), 	to_insert_lang('keywords',$_POST,0));

$DB->query("update ?_pages set ?a where id=?",$insert, $_POST['issue_id']);

exit;

?>