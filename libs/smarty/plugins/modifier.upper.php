<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty upper modifier plugin
 *
 * Type:     modifier<br>
 * Name:     upper<br>
 * Purpose:  convert string to uppercase
 * @link http://smarty.php.net/manual/en/language.modifier.upper.php
 *          upper (Smarty online manual)
 * @param string
 * @return string
 */
function smarty_modifier_upper($string)
{
	//setlocale(LC_ALL, 'ru_RU.CP1251');
    return mb_convert_case($string, MB_CASE_UPPER, "UTF-8");
}

?>
