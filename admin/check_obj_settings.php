<?
require("common/connect_templates.php");
foreach ($parameters['objects'] as $key => $value) {
		$insert[$value['name']]=$_POST[$value['name']];
	}

// $insert=array('is_shown'=>$_POST['is_shown'],'price'=>$_POST['price'],'selected'=>$_POST['selected'],);
	$DB->query("update ?_objects set ?a  where id=?",$insert,$_POST['issue_id']);
  exit; 
?>