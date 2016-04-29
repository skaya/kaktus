<?php
//this file should be in windows-1251 encoding!!!!!
function cyr_to_lat($content) {
$array = array(
"à" => "a",
"á" => "b",
"â" => "v",
"ã" => "g",
"ä" => "d",
"å" => "e",
"¸" => "e",
"æ" => "zh",
"ç" => "z",
"è" => "i",
"é" => "j",
"ê" => "k",
"ë" => "l",
"ì" => "m",
"í" => "n",
"î" => "o",
"ï" => "p",
"ð" => "r",
"ñ" => "s",
"ò" => "t",
"ó" => "u",
"ô" => "f",
"õ" => "h",
"ö" => "c",
"÷" => "ch",
"ø" => "sh",
"ù" => "sh",
"û" => "i",
"ü" => "",
"ú" => "",
"ý" => "e",
"þ" => "yu",
"ÿ" => "ya");
 
 $content = trim($content);
$content = iconv('utf-8', 'windows-1251', $content);
strtolower($content);
//foreach($array as $val=>$key) 
//$content = mb_ereg_replace($val,$key,mb_strtolower($content));

preg_replace("/[^0-9a-zà-ÿ_.\/]/","_",$myfile);

return $content;
}

?>