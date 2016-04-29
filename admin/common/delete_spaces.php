<?php
function deleteSpaces($text)
{
	$text=str_replace ("<p>&nbsp;</p>", "", stripslashes($text));
	$text=str_replace ('<p align="left">&nbsp;</p>', "", $text);
	$text=str_replace ('<p align="right">&nbsp;</p>', "", $text);
	$text=str_replace ('<p align="center">&nbsp;</p>', "", $text);
	$text=str_replace ('<p align="justify">&nbsp;</p>', "", $text);
	
	return $text;
}


?>