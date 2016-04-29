<?php
require_once("config.php");


//require_once($root_abs.'libs/smarty_ajax.php');
// Подключаем библиотеку.
require_once ($root_abs."libs/DbSimple/Generic.php");
require_once ($root_abs."libs/DbSimple/config.php");
// Устанавливаем соединение.

$DB = DbSimple_Generic::connect("mysql://$db_user:$db_pass@$db_host/$db_name");


// Дальше работаем с соединением (или текущей транзакцией) $DB. 
// Например: $DB->select(...).
if($report_errors==1)
{

	require_once($root_abs.'common/error_reporting.php');
}




$DB->query ('set names utf8');
define(TABLE_PREFIX, $db_prefics); // с подчерком!
$DB->setIdentPrefix(TABLE_PREFIX); 


define('SMARTY_DIR', $root_abs.'libs/smarty/');
require_once(SMARTY_DIR.'Smarty.class.php');
/** Start session */

session_start();

require_once($root_abs.'libs/smarty_ajax.php');

$smarty = new Smarty();
$smarty->debugging = false;
$smarty->force_compile = true;
$smarty->caching = false;
$smarty->compile_check = true;
$smarty->cache_lifetime = -1;

$smarty->plugins_dir = array(
  SMARTY_DIR . 'plugins',
  $root_abs.'libs/plugins');
$smarty->assign("root",$root);

function get_langs($str){
	global $langs;
	foreach ($langs as $key => $value) {
		$fields[]=$prefics.$str."_".$value;
	}
	return $fields;
}
function to_insert_lang($field,$array,$deleteSpaces)
{	global $langs,$page_old;
	$data_to_save=array();
	foreach ($langs as $key => $value) {
		if($deleteSpaces==1)
		{
			$array[$field.'_'.$value]=str_replace('"#','"page-'.$_REQUEST['issue_id'].'-'.$value.'.html#', deleteSpaces($array[$field.'_'.$value]));
		}
  	$data_to_save[$field.'_'.$value]=$array[$field.'_'.$value];	
  }
 // var_dump($data_to_save);
  return($data_to_save);
}
function get_current_lang($str){
	global $langs;

	if(isset($_REQUEST['lang'])&$_REQUEST['lang']!='')
	{$cur_lang=$_REQUEST['lang'];
	}
	else{$cur_lang=$langs[0];
	}
		$field=$str."_".$cur_lang;

	return $field;
}

//$smarty->assign("langs_content",$langs_content);
$smarty->assign("langs",$langs);




?>