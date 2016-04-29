<?php
function img_resize($src, $dest, $target_width, $target_height,  $type, $rgb=0xFFFFFF, $quality=100)
{
  if (!file_exists($src)) return false;
  $size = getimagesize($src);

  if ($size === false) return false;

  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;
  
  if(($size[0] >$size[1])&($size[0] > $target_width)){ //картинка горизонтальная
		$ratio = $size[0]/$target_width;
		$width = round($size[0]/$ratio);
		$height = round($size[1]/$ratio); 
		
		//img_resize($_FILES['uploadedfile']['tmp_name'],$root_abs.$file1,$w_dest,$h_dest,0); 
	
  }else if((($size[0]<=$size[1])&($size[1] > $target_height))||(($size[0]>$size[1])&($size[0] < $target_width)&($size[1] > $target_height)))//картинка вертикальная
  {		$ratio = $size[1]/$target_height;
		$width = round($size[0]/$ratio);
		$height = round($size[1]/$ratio); 	  
	  }
	    
	  else {
		$width = $size[0];
		$height= $size[1];
	}

  

  $x_ratio = $width / $size[0];
  $y_ratio = $height / $size[1];

  $ratio       = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);

  $new_width   = $use_x_ratio  ? $width  : round($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : round($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : round(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : round(($height - $new_height) / 2);

  $isrc = $icfunc($src);
  if ($type == 1) {
             // создаём пустую квадратную картинку
           // важно именно truecolor!, иначе будум иметь 8-битный результат
		   $new_width=$target_width;
		  // $new_height=$target_height;
           $idest = imagecreatetruecolor($new_width, $target_height) or die("Cannot Initialize new GD image stream");
		   imagefill($idest, 0, 0, $rgb);

           // вырезаем квадратную серединку по x, если фото горизонтальное
         /*  if ($size[0]>$size[1])
           imagecopyresampled($idest, $isrc, 0, 0, round((max($size[0], $size[1])-min($size[0], $size[1]))/2), 0, $new_width, $new_height, min($size[0], $size[1]), min($size[0], $size[1]));
           // вырезаем квадратную верхушку по y,
           // если фото вертикальное (хотя можно тоже середику)*/
           if ($size[0]<$size[1]||$size[0]>$size[1])
		   //imagecopyresampled($idest, $isrc, 0, 0,  0,round((max($size[1], $size[0])-min($size[1], $size[0]))/2), $new_width, $new_width, min($size[0], $size[1]), min($size[0], $size[1]));// если фото вертикальное вырезаем верхушку
           imagecopyresampled($idest, $isrc, 0, 0, 0, round((max($size[1], $size[0])-min($size[1], $size[0]))/2), $new_width, $new_height, min($size[0], $size[1]), min($size[0], $size[1]));// если фото вертикальное вырезаем серединку
		   
           // квадратная картинка масштабируется без вырезок
           if ($size[0]==$size[1])
           imagecopyresampled($idest, $isrc, 0, 0, 0, 0,  $new_width, $new_height, $size[0], $size[0]);

  } else {
//  	  $count_str = array();
//	  $count_str = count_str($width, $_REQUEST['name_img']);

	  $idest = imagecreatetruecolor($width, $height);
	  //$rgb = 0x3251A2;
	  imagefill($idest, 0, 0, $rgb);
	  $new_left = 0;
	  $new_top = 0;
	  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);
//	  $mf = imageloadfont('myfont.phpfont');
//	  for ($i = 0; $i < count($count_str); $i++) {
//	  	imagestring($idest, $mf, 10, $height+15+$i*10, stripcslashes($count_str[$i]), 0x000000);
//	  }
}
//	echo "Файл загружается в  -------  ".$dest;
	 @imagejpeg($idest, $dest, $quality);
	 imagedestroy($isrc);
  	imagedestroy($idest);


  return true;
}
?>