<?php
//this file should be in windows-1251 encoding!!!!!
function cyr_to_lat($content) {
$array = array(
"�" => "a",
"�" => "b",
"�" => "v",
"�" => "g",
"�" => "d",
"�" => "e",
"�" => "e",
"�" => "zh",
"�" => "z",
"�" => "i",
"�" => "j",
"�" => "k",
"�" => "l",
"�" => "m",
"�" => "n",
"�" => "o",
"�" => "p",
"�" => "r",
"�" => "s",
"�" => "t",
"�" => "u",
"�" => "f",
"�" => "h",
"�" => "c",
"�" => "ch",
"�" => "sh",
"�" => "sh",
"�" => "i",
"�" => "",
"�" => "",
"�" => "e",
"�" => "yu",
"�" => "ya");
 
 $content = trim($content);
$content = iconv('utf-8', 'windows-1251', $content);
strtolower($content);
//foreach($array as $val=>$key) 
//$content = mb_ereg_replace($val,$key,mb_strtolower($content));

preg_replace("/[^0-9a-z�-�_.\/]/","_",$myfile);

return $content;
}

?>