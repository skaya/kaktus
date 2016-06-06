<?php
  $user = 'root';
  $password = 'root';
  $dbname = 'kaktus';
  $host = 'localhost:8889';
  $root="http://localhost:8888/kaktus/";
  $root_abs="/Applications/MAMP/htdocs/kaktus/";

  $DB = mysqli_connect($host,$user,$password,$dbname);

  if (!$DB) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $DB->query ('set names utf8');

  define('SMARTY_DIR', $root_abs.'libs/smarty/');
  require_once(SMARTY_DIR.'Smarty.class.php');

  session_start();

  /** Smarty configuration */

  $smarty = new Smarty();

  $smarty->debugging = true;
  $smarty->error_reporting = E_ALL & ~E_NOTICE;
  $smarty->force_compile = true;
  $smarty->caching = false;
  $smarty->compile_check = true;
  $smarty->cache_lifetime = -1;
  $smarty->plugins_dir = array(
    SMARTY_DIR . 'plugins',
    $root_abs.'libs/plugins');


  $smarty->assign("root", $root);


?>
