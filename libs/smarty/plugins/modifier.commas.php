<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_commas($string)
{
	$str = '';
	$check = 0;
	for ($i = 0; $i < strlen($string); $i++) {
		if ($string[$i] == '"') {
			if ($check == 0) {
				$str .= "";			
				$check = 1;
			} else {
				$str .= "";
				$check = 0;
			}
		} else {
			$str .= $string[$i];
		}
	}
	return $str;
}

/* vim: set expandtab: */

?>
