<?php
require("common/connect_templates.php");



 // Edit upload location here
$destination_path = "Image/big/";
$destination_path_sm = "Image/sm/";
//$destination_path_prev = "Image/prev/";
$destination_path_origin = "Image/origin/";
$result = 0;
	//uploading_file
$img_prefics=$_POST['to_connect']."_".$_POST['issue_id'].$_POST['id'];
//var_dump($img_prefics);
$myfile = $img_prefics."_".cyr_to_lat(basename($_FILES['myfile']['name']));
//var_dump($myfile);
$file_path=$destination_path.$myfile;
$file_path_sm=$destination_path_sm.$myfile;
//$file_path_prev=$destination_path_prev.$myfile;
$file_path_origin=$destination_path_origin.$myfile;

$target_path = $root_abs.$file_path;
$target_path_sm = $root_abs.$file_path_sm;
//$target_path_prev = $root_abs.$file_path_prev;
$target_path_origin = $root_abs.$file_path_origin;

@copy($_FILES['myfile']['tmp_name'], $target_path_origin);
@copy($target_path_origin, $target_path);
@copy($target_path_origin, $target_path_sm);
//@copy($target_path_origin, $target_path_prev);
@unlink($_FILES['myfile']['tmp_name']);

//resizing_file
if($_POST['upload_type']=="image") {
	img_resize($target_path,$target_path, $image_size['page_image']['image_big']['width'],$image_size['page_image']['image_big']['height'],$image_size['page_image']['image_big']['scale']);
	img_resize($target_path_sm,$target_path_sm,$image_size['page_image']['image_small']['width'],$image_size['page_image']['image_small']['height'],$image_size['page_image']['image_small']['scale']);
	//img_resize($target_path_prev,$target_path_prev,$image_size['page_image']['image_prev']['width'],$image_size['page_image']['image_prev']['height'],$image_size['page_image']['image_prev']['scale']);
}

//resizing_file
if($_POST['upload_type']=="icon") {
	if(!isset($_POST['width'])||$_POST['width']=='') {
		$_POST['width']=$image_size['page_icon']['image_small']['width'];
	}
	if(!isset($_POST['height'])||$_POST['height']=='') {
		$_POST['height']=$image_size['page_icon']['image_small']['height'];
	}
	if(!isset($_POST['scale'])||$_POST['scale']=='') {
		$_POST['scale']=0;
	}
	img_resize($target_path,$target_path, $image_size['page_image']['image_big']['width'],$image_size['page_image']['image_big']['height'],$image_size['page_image']['image_big']['scale']);
	img_resize($target_path_sm,$target_path_sm,$_POST['width'],$_POST['height'],$_POST['scale']);
	//img_resize($target_path_prev,$target_path_prev,$image_size['page_image']['image_prev']['width'],$image_size['page_image']['image_prev']['height'],$image_size['page_image']['image_prev']['scale']);
}

chmod($target_path,0775);
//chmod($target_path_prev,0775);
chmod($target_path_sm,0775);
chmod($target_path_origin,0775);


if($_POST['to_connect']=="page"&$_POST['upload_type']=="image") {
	$rank=$DB->selectCell("Select MAX(id) as id from ?_pictures");
	$rank++;
	$data_to_save=array('rank'=>$rank,'picture'=>$file_path,'picture_sm'=>$file_path_sm,'picture_origin'=>$file_path_origin,'page_id'=>$_POST['issue_id']);

	$data_to_save=array_merge($data_to_save, to_insert_lang('name',$_POST,0));//добавляем поля на разных языках

	$DB->query("INSERT INTO ?_pictures (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
	$data_to_save=array('page_id'=>$_POST['issue_id'], 'obj_id'=>$rank,'rank'=>$rank);

	$DB->query("INSERT INTO ?_pictures_to_pages (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
}

if($_POST['to_connect']=="page"&$_POST['upload_type']=="icon") {
	$data_to_save=array('icon_sm'=>$file_path_sm,'icon'=>$file_path_origin,);
	$DB->query("Update ?_pages set ?a where id=?",$data_to_save,$_POST['issue_id']);
}

if($_POST['to_connect']=="object"&$_POST['upload_type']=="icon") {
	$data_to_save=array('icon_sm'=>$file_path_sm,'icon'=>$file_path,);
	$DB->query("Update ?_objects set ?a where id=?",$data_to_save,$_POST['id']);
}

if($_POST['to_connect']=="object"&$_POST['upload_type']=="image") {
	$rank=$DB->selectCell("Select MAX(id) as id from ?_obj_pict");
	$rank++;
	$data_to_save=array('obj_id'=>$_POST['id'],'rank'=>$rank,'picture'=>$file_path,'picture_sm'=>$file_path_sm,'picture_prev'=>$file_path_prev,'picture_origin'=>$file_path_origin,);

	$data_to_save=array_merge($data_to_save, to_insert_lang('name',$_POST,0));//добавляем поля на разных языках

	$DB->query("INSERT INTO ?_obj_pict (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
}

//if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
	$result = 1;
//}

sleep(1);

if($_POST['upload_type']=="image"&$_POST['to_connect']=="page") {?>
	<?=$_POST['page']; ?>
	<script language="javascript" type="text/javascript">
		parent.stopUpload(<?=$_POST['issue_id']; ?>);
	</script> <?
} else if($_POST['upload_type']=="icon"&$_POST['to_connect']=="page") {?>
	<script language="javascript" type="text/javascript">
		parent.stopUpload_icon(<?=$_POST['issue_id']; ?>,"<?=$_POST['garmoshka_set_name']; ?>");
	</script>
	<? ;
} else if($_POST['upload_type']=="image"&$_POST['to_connect']=="object") {?>
	<script language="javascript" type="text/javascript">parent.stopUploadObj(<?=$_POST['id']; ?>,<?=$_POST['page']; ?>,"<?=$_POST['garmoshka_set_name']; ?>");</script>
	<? ;
} else if($_POST['upload_type']=="icon"&$_POST['to_connect']=="object") {
	?>
	<script language="javascript" type="text/javascript">parent.stopUploadObj_icon(<?=$_POST['id']; ?>,"<?=$_POST['garmoshka_set_name']; ?>");</script>
	<? ;};
?>
