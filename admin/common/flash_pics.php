<?
function getNeiborsF(){
	global $DB, $db_prefics;
	$query_result = mysql_query("SELECT rank FROM ".$db_prefics."section_flash WHERE section_id=".$_REQUEST['issue_id']." ORDER BY rank", $DB);
	$rank = mysql_fetch_assoc(mysql_query("SELECT rank FROM ".$db_prefics."section_flash WHERE picture_id=".$_REQUEST['menue']." AND section_id=".$_REQUEST['issue_id'], $DB));
	print mysql_error();
	$neibors['prev'] = $rank['rank'];
	$neibors['next'] = $rank['rank'];  	
	while ( $row = mysql_fetch_assoc($query_result) ) 
		if ( $row['rank'] < $rank['rank'] )
			$neibors['next'] = $row['rank'];			
		else if ( $row['rank'] > $rank['rank'] ) {
			$neibors['prev'] = $row['rank'];
			break;
		}
//	echo "next is:".$neibors['next']."prev is:".$neibors['prev'];
	return $neibors;
}

function replaceItemsF($how) {
	global $DB, $db_prefics;
	$neibor = getNeiborsF();
	if ( isset($how) && $how == "next")
		$neibor = $neibor['next'];
	else if ( isset($how) && $how == "prev")
		$neibor = $neibor['prev'];	
	$rank = mysql_fetch_assoc(mysql_query("SELECT rank FROM ".$db_prefics."section_flash WHERE section_id=".$_REQUEST['issue_id']." AND picture_id=".$_REQUEST['menue'], $DB));
	print mysql_error();
	$rank = $rank['rank'];
	if (isset($neibor) && $neibor != $rank) {		
		mysql_query("UPDATE ".$db_prefics."section_flash SET rank=".$rank." WHERE section_id=".$_REQUEST['issue_id']." AND rank=".$neibor, $DB);				
		mysql_query("UPDATE ".$db_prefics."section_flash SET rank=".$neibor." WHERE picture_id=".$_REQUEST['menue']." AND section_id=".$_REQUEST['issue_id'], $DB);	
		print mysql_error();	
	}
	return $neibor;
}
//FLASH ONLY


if($_REQUEST['action']=="edit_page")
{//list of pictures in flash
	$query_result = mysql_query("
	SELECT  ".$db_prefics."flash_pictures.*, ".$db_prefics."section_flash.picture_id, ".$db_prefics."section_flash.rank
	FROM ".$db_prefics."section_flash
	LEFT JOIN ".$db_prefics."flash_pictures ON ".$db_prefics."flash_pictures.id = ".$db_prefics."section_flash.picture_id
	WHERE ".$db_prefics."section_flash.section_id = ".$_REQUEST['issue_id']." ORDER BY ".$db_prefics."section_flash.rank", $DB);
	print mysql_error();
	$flash=array();
	$temp_array = array();
	while($row = mysql_fetch_array($query_result)) {
		array_push( $temp_array, $row['id'] );	
		//if ( function_exists("gd_info") ) 	
			//$row['path'] = $root."admin/common/show_resized.php?width=".$width_picture_small."&picture=".$root.$row['path'];				
		$flash[]=$row;
	};	
	$smarty->assign('flash_pictures',$flash);
	

	$query_result = mysql_query("SELECT * FROM ".$db_prefics."flash_pictures", $DB);
	print mysql_error();
	while($row = mysql_fetch_array($query_result)) {
		if ( in_array( $row['id'], $temp_array ) )
			continue;	
		$row['name'] = substr( $row['path'], strrpos($row['path'], "/")+1, strlen($row['path']) );
		$row['name'] = substr( $row['name'], strpos($row['name'], "_")+1, strlen($row['name']) );
		//if ( function_exists("gd_info") ) 	
			//$row['path'] = $root."admin/common/show_resized.php?width=".$width_picture_normal."&picture=".$root.$row['path'];			
		$flash_array[]=$row;
	};
	$smarty->assign('all_flashpictures',$flash_array);
}


//add/delete content menu selected page/section
if ($_REQUEST['action']=="add_picture") {
	saveData();
	//set rank as ++max_rank
	$rank = mysql_fetch_assoc( mysql_query(" SELECT MAX(rank) AS rank FROM ".$db_prefics."section_flash WHERE section_id =".$_REQUEST['issue_id'], $DB) );
	print mysql_error();	
	if ( !isset($rank) || $rank['rank'] == '') $rank['rank'] = 0;
	mysql_query("INSERT INTO ".$db_prefics."section_flash (picture_id, section_id, rank) VALUES (
			".mysql_escape_string(stripslashes($_REQUEST['picture'])).", 
			".mysql_escape_string(stripslashes($_REQUEST['issue_id'])).",
			".mysql_escape_string(stripslashes(++$rank['rank'])).")",$DB);	
	print mysql_error();	
	header("location:page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}
if ($_REQUEST['action']=="delete_flash") {
	mysql_query("DELETE FROM ".$db_prefics."section_flash WHERE 
			picture_id=".mysql_escape_string(stripslashes($_REQUEST['menue']))." AND
			section_id=".mysql_escape_string(stripslashes($_REQUEST['issue_id'])),$DB);
	print mysql_error();
	saveData();	
	header("location:page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();	
}

//change a consequence of the content menu on the selected page/section
if ($_REQUEST['action']=="flash_up") {	
	saveData();	
	replaceItemsF("next");
	header("location:page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}
if ($_REQUEST['action']=="flash_down") {
	saveData();	
	replaceItemsF("prev");
	header("location:page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}

if ( $_REQUEST['action'] == 'delete_flash_real') {
	//delete real file
	$query_result = mysql_query("SELECT path FROM ".$db_prefics."flash_pictures WHERE id=".$_REQUEST['menue'], $DB);
	
	$path = mysql_fetch_assoc($query_result); 
	$path = $path['path'];
	$path  = $root_abs.$path;	
	//if ( file_exists($path) ) {
		if( !unlink($path) ) echo "Change PHP ini to delete files";		
	//}	
	//delete from dataBases
	$query_result = mysql_query("DELETE FROM ".$db_prefics."flash_pictures where id=".$_REQUEST['menue'], $DB);
	print mysql_error();
	$query_result = mysql_query("DELETE FROM ".$db_prefics."section_flash where picture_id=".$_REQUEST['menue'], $DB);
	print mysql_error();
	header("location:page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();	
	
}

//upload background picture
if ( $_REQUEST['action']=="upload_flash_pic"){
	//print_r ($_FILES);	
	//echo $_REQUEST['uploadedfile'];
	//set new picture
	/*check file extension*/
	$image_formats = array('image/gif', 'image/pjpeg', 'image/tiff', 'image/x-png', 'image/x-portable-greymap',
					'image/x-portable-pixmap', 'image/x-portablebitmap', 'image/x-rgb', 'image/x-photo-cd', 'image/x-ms-bmp');
	if ( !in_array($_FILES['uploadedfile']['type'], $image_formats) ){ 
		echo "Uploaded file must be an image. Other file types are not allowed. This file has type: ".$_FILES['uploadedfile']['type'];
		exit();
	}	
	// Where the file is going to be placed 
	mysql_query("LOCK TABLES ".$db_prefics."flash_pictures WRITE", $DB);
	$target_path = "flash_img/";	
	$temp_id = mysql_fetch_assoc( mysql_query(" SELECT MAX(id) AS id FROM ".$db_prefics."flash_pictures", $DB) );	
	$temp_id = $temp_id['id'] + 1;	
	$target_path.= $temp_id."_".basename( $_FILES['uploadedfile']['name']); 		
	if(! move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $root_abs.$target_path)) {
	    echo "There was an error uploading the file, please try again!";
		mysql_query("UNLOCK TABLES", $DB);		
		exit();
	}					
	mysql_query("INSERT INTO ".$db_prefics."flash_pictures (id, path) VALUES ( 
			".mysql_escape_string(stripslashes($temp_id)).",
			'".mysql_escape_string(stripslashes($target_path))."')" ,$DB);
	print mysql_error();	
	mysql_query("UNLOCK TABLES", $DB);	
	header ("location: page.php?action=edit_page&issue_id=".$_REQUEST['issue_id']);
	exit();	
}

//FLASH

//upload background picture
if ( $_REQUEST['action']=="upload"){	
	//set new picture
	/*check file extension*/
	$image_formats = array('image/pjpeg', 'image/x-png');
	if ( !in_array($_FILES['uploadedfile']['type'], $image_formats) ){ 
		echo "Uploaded file must be an image. Other file types are not allowed. This file has type: ".$_FILES['uploadedfile']['type'];
		exit();
	}	
	// Where the file is going to be placed 
	mysql_query("LOCK TABLES ".$db_prefics."flash_pictures WRITE", $DB);
	$target_path = "flash_img/";	
	$temp_id = mysql_fetch_assoc( mysql_query(" SELECT MAX(id) AS id FROM ".$db_prefics."flash_pictures", $DB) );	
	$temp_id = $temp_id['id'] + 1;	
	$target_path.= $temp_id."_".basename( $_FILES['uploadedfile']['name']); 		
	if(! move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $root_abs.$target_path)) {
	    echo "There was an error uploading the file, please try again!";
		mysql_query("UNLOCK TABLES", $DB);		
		exit();
	}					
	mysql_query("INSERT INTO ".$db_prefics."flash_pictures (id, path) VALUES ( 
			".mysql_escape_string(stripslashes($temp_id)).",
			'".mysql_escape_string(stripslashes($target_path))."')" ,$DB);
	print mysql_error();	
	mysql_query("UNLOCK TABLES", $DB);		
}

//show all pictures
$query_result = mysql_query("SELECT * FROM ".$db_prefics."flash_pictures", $DB);
print mysql_error();
while($row = mysql_fetch_array($query_result)) 
	$photoes[]=$row;
$smarty->assign('photoes',$photoes);
?>