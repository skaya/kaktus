<?
require("common/connect_templates.php");
$insert=array();
if(isset($_POST['main'])&$_POST['main']==1) {
	$DB->query("update ?_pages set main=0 where main=1");
}

foreach ($parameters['pages'] as $key => $value) {
	$insert[$value['name']]=$_POST[$value['name']];
}

$insert['link']=$_POST['link'];

$DB->query("update ?_pages set ?a where id=?",$insert, $_POST['issue_id']);
exit;

?>