<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0
require("common/connect_templates.php");

function upload_image($file){
	global $root_abs, cyr_to_lat;
	if (is_uploaded_file($file)) {
		$image_formats = array('image/gif', 'image/pjpeg', 'image/jpeg', 'image/tiff', 'image/x-png', 'image/x-portable-greymap', 'image/x-portable-pixmap', 'image/x-portablebitmap', 'image/x-rgb', 'image/x-photo-cd', 'image/x-ms-bmp');
		if (!in_array($file['type'], $image_formats) ){ 
			echo "Uploaded file must be an image. Other file types are not allowed. This file has type: ".$file['type'];
			exit();
		}
	}	
	$size = getimagesize($file['tmp_name']);
		
	$w_src = $size[0];
	$h_src = $size[1];
	if($w_src > $h_src)
	{$ratio =$h_src/100;}
	else{
	$ratio = $w_src/100;
	}
	$w_dest = 100;
	$h_dest = 100;
	
	$myfile = basename($file['name']);
	$myfile = cyr_to_lat($myfile);

	$file = "image/sm/".$_REQUEST['issue_id']."_".$_REQUEST['lng']."_".$myfile;
	$file1 = "image/big/".$_REQUEST['issue_id']."_".$_REQUEST['lng']."_".$myfile;
	img_resize($file['tmp_name'],$root_abs.$file,$w_dest,$h_dest,1); 

	chmod($root_abs.$file,0775);

	
	if ($w_src > 700) {
		$ratio = $w_src/700;
		$w_dest = round($w_src/$ratio);
		$h_dest = round($h_src/$ratio);
		img_resize($file['tmp_name'],$root_abs.$file1,$w_dest,$h_dest,0); 
	} else {
		$w_dest = $w_src;
		$h_dest = $h_src;
		img_resize($file['tmp_name'],$root_abs.$file1,$w_dest,$h_dest,0); 
	}
	chmod($root_abs.$file1,0775);	
}



if (!empty($_POST)) {

    $errors[] = 'Информация обновлена';

  if (!empty($errors)) {
    echo 'false';
    foreach ($errors as $error) {
      echo ';' . $error;
    }
  }

	$pics=upload_image($_FILES['upload']);
	$insert=array('page_id'=>$_POST['page_id'],'picture'=>$pics['picture'],'picture_sm'=>$pics['picture_sm'],'name'=>$_POST['name'],);
	$DB->query("update ?_page_pict set ?a",$insert);

  exit;
}
?>