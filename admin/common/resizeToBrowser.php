<?php
//image resizing

//can resize images when path is specified either local or http://. It supports JPEG, PNG, GIF
$file_source = $_REQUEST['picture'];
$width_picture_MAX =  $_REQUEST['width'];
//echo "---".$file_source;
list($width, $height, $type) = getimagesize ($file_source);	
//
ob_start();
//
switch ($type) {
	case 1: $source = imagecreatefromgif($file_source); break;
	case 2: $source = imagecreatefromjpeg($file_source); break;
	case 3: $source = imagecreatefrompng($file_source); break;
	default: echo "Unknown image format"; return 0;
}

$thumb = $source;
if ( $width > $width_picture_MAX) { 
	$heigh_picture_MAX = ceil( $height *  $width_picture_MAX / $width);
	//resize image
	$thumb = imagecreatetruecolor( $width_picture_MAX, $heigh_picture_MAX);			
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $width_picture_MAX, $heigh_picture_MAX, $width, $height);			
}

switch ($type) {
	case 1: imagegif($thumb); break;
	case 2: imagejpeg($thumb); break;
	case 3: imagepng($thumb); break;
	default: echo "Unknown image format"; return 0;
}
$ImageData = ob_get_contents();
$ImageDataLength = ob_get_length();
//
ob_end_clean(); // stop this output buffer	
//
echo $ImageData;					

?>