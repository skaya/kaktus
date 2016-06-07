<?php
session_start();

srand();
$try=makerandom(4,6);
$_SESSION['string']=md5($try);
onrefresh($try);

function makerandom($minlength, $maxlength) {
	$characters = "0123456789"; 
 	if ($minlength > $maxlength) {
		$length = rand ($maxlength, $minlength); 
	} else {
		$length = rand ($minlength, $maxlength); 
	}
	$totallen=strlen($characters)-1;
	for ($i=0; $i<$length; $i++) {
	    $result=$result.$characters[rand(0,$totallen)]; 
    }
    return $result; 
}

function onrefresh($str) {
	$image=imagecreate(100,30);
    // something to get a white background with black border
    $back = imagecolorallocate($image, 0, 0, 0);
    $border = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 99,29, $border);
    
    imagerectangle($image, 0, 0,99,29, $back);
    $textcolor=imagecolorallocate($image,45,59,34);
    $setkacolor=imagecolorallocate($image,200,200,200);
    //to write string in image
	for ($i=0; $i<strlen($str); $i++) {
		imagechar($image,5,$i*15+5,rand(2,10),$str[$i],$textcolor);
	}
	for ($i=1; $i<6; $i++) {
		imageline($image,0,$i*5,100,$i*5,$setkacolor);
	}
    header('Content-type:image/png');
    imagepng($image);
}
?>