<?
	require("common/connect_templates.php");

	$cont =$DB->select("select * from ".$db_prefics."contact");
		$smarty->assign('cont',$cont);
		$smarty->assign('left', $smarty->fetch('contact.tpl'));
		
	$smarty->assign('cur_page','contact');
	$smarty->display('main.tpl');
	
	if ($_REQUEST['action'] == "upload") {
		if (is_uploaded_file($_FILES['uploadedfile']['tmp_name'])) {
			$image_formats = array('image/gif', 'image/pjpeg', 'image/jpeg', 'image/tiff', 'image/x-png', 'image/x-portable-greymap', 'image/x-portable-pixmap', 'image/x-portablebitmap', 'image/x-rgb', 'image/x-photo-cd', 'image/x-ms-bmp');
			if (!in_array($_FILES['uploadedfile']['type'], $image_formats) ){ 
				echo "Uploaded file must be an image. Other file types are not allowed. This file has type: ".$_FILES['uploadedfile']['type'];
				exit();
			}
		}		
		$size = getimagesize($_FILES['uploadedfile']['tmp_name']);
		$w_src = $size[0];
		$h_src = $size[1];
		$ratio = $w_src > $h_src ? $h_src/100 : $w_src/100;
		$w_dest = round($w_src/$ratio);
		$h_dest = round($h_src/$ratio);
		$file = "Image/foto/sm/".$_REQUEST['issue_id']."_".basename( $_FILES['uploadedfile']['name']);
		$file1 = "Image/foto/big/".$_REQUEST['issue_id']."_".basename( $_FILES['uploadedfile']['name']);
		img_resize($_FILES['uploadedfile']['tmp_name'],$root_abs.$file,$w_dest,$h_dest,1); 
		chmod($root_abs.$file,0775);
		$icq=ereg_replace (" ", "", $_REQUEST['icq']);
		$icq=ereg_replace ("-", "", $icq);
		mysql_query("update ".$db_prefics."contact set foto='".$file."', fio='".$_REQUEST['fio']."', text='".$_REQUEST['text']."', email='".$_REQUEST['email']."', icq='".$icq."' where id=".$_REQUEST['issue_id'],$DB);
		print mysql_error();
		copy($_FILES['uploadedfile']['tmp_name'],$root_abs.$file1);
		chmod($root_abs.$file1,0775);
		$_REQUEST['action'] = 'edit';
	}
	
	
	if ($_REQUEST['action'] == 'add_cont') {
		mysql_query("insert into ".$db_prefics."contact (fio,text) values('','')",$DB);
		print mysql_error();
		$result = mysql_fetch_assoc(mysql_query("select max(id) as id from ".$db_prefics."contact",$DB));
		print mysql_error();
		
		include 'spaw/spaw_control.class.php';
		$sd = new SPAW_Wysiwyg('text' /*name*/,'' /*value*/,'ru','full','','','200px');
		$smarty->assign("text",$sd->getHtml());

		$smarty->assign('result',$result);
		$smarty->assign('check',1);
		$smarty->assign('content', $smarty->fetch('contact.tpl'));
		$smarty->display('main.tpl');

	} elseif ($_REQUEST['action'] == "edit") {
		$result = mysql_fetch_assoc(mysql_query("select * from ".$db_prefics."contact where id=".$_REQUEST['issue_id'],$DB));		
		print mysql_error();
		include 'spaw/spaw_control.class.php';
		$sd = new SPAW_Wysiwyg('text' /*name*/,stripslashes($result['text']) /*value*/,'ru','full','','','200px');
		$smarty->assign("text",$sd->getHtml());
		$smarty->assign('result',$result);
		$smarty->assign('check',1);
		$smarty->assign('content', $smarty->fetch('contact.tpl'));
		$smarty->display('main.tpl');
	} elseif ($_REQUEST['action'] == "delete_cont") {
		mysql_query("delete from ".$db_prefics."contact where id=".$_REQUEST['issue_id'],$DB);
		mysql_query("delete from ".$db_prefics."contact_page where id_cont=".$_REQUEST['issue_id'],$DB);
		
		print mysql_error();
		header("location:contact.php");
	} elseif ($_REQUEST['action'] == "save") {
	$icq=ereg_replace (" ", "", $_REQUEST['icq']);
		$icq=ereg_replace ("-", "", $icq);
		if($_REQUEST['main']=='')
		{$_REQUEST['main']=0;}
		mysql_query("update ".$db_prefics."contact set fio='".$_REQUEST['fio']."', main='".$_REQUEST['main']."', text='".$_REQUEST['text']."', email='".$_REQUEST['email']."', icq='".$icq."', skype='".$_REQUEST['skype']."' where id=".$_REQUEST['issue_id'] ,$DB);
		print mysql_error();
		header("location:contact.php");
	}
		

?>