<?php
require("common/connect_templates.php");
   // Edit upload location here
   $data_to_save=array('author'=>$_SESSION['id']);
    $destination_path_origin = "File/files/";
   $result = 0;
 	//uploading_file
	$prefics=$_POST['to_connect']."_".$_POST['issue_id'].$_POST['id'];

	$myfile = $prefics."_".cyr_to_lat(basename($_FILES['myfile']['name']));

	$file_path_origin=$destination_path_origin.$myfile;
	
   $target_path_origin = $root_abs.$file_path_origin;
   
	@copy($_FILES['myfile']['tmp_name'], $target_path_origin);
	@unlink($_FILES['myfile']['tmp_name']);
	
	//resizing_file	

	chmod($target_path_origin,0775);	
	
	$data_to_save['file']=$file_path_origin;
   
	
	$data_to_save=array_merge($data_to_save, to_insert_lang('name',$_POST,0));//добавляем поля на разных языках
		
		$DB->query("INSERT INTO ?_files  (?#,time) VALUES (?a,now())",array_keys($data_to_save), array_values($data_to_save));
		$id=$DB->selectCell("select MAX(id) as id from ?_files");
		
	if($_POST['to_connect']=="page")
	{
		$rank=$DB->selectCell("select MAX(id) as id from ?_files_to_pages");
		$rank++;
		$link=array('rank'=>$rank,'obj_id'=>$id,'page_id'=>$_POST['issue_id']);
		$DB->query("INSERT INTO ?_files_to_pages  (?#) VALUES (?a)",array_keys($link), array_values($link));
	}
	else if($_POST['to_connect']=="object")
	{$rank=$DB->selectCell("select MAX(id) as id from ?_files_to_objects");
		$rank++;
		$link=array('rank'=>$rank,'obj_id'=>$id,'page_id'=>$_POST['id']);
		$DB->query("INSERT INTO ?_files_to_objects  (?#) VALUES (?a)",array_keys($link), array_values($link));
	}
	
   //if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
      $result = 1;
   //}
   


   sleep(1);
		

if($_POST['to_connect']=="page")
	{
?>
<script language="javascript" type="text/javascript">parent.stopUpload_file(<?=$_POST['issue_id']; ?>,<?=$_POST['page']; ?>,"<?=$_POST['garmoshka_set_name']; ?>");</script> <? ;
}
	else if($_POST['to_connect']=="object")
	{
	?>
<script language="javascript" type="text/javascript">parent.stopUploadObj_file(<?=$_POST['id']; ?>,<?=$_POST['page']; ?>,"<?=$_POST['garmoshka_set_name']; ?>");</script> <? ;
};
	?>