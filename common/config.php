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

  ini_set('display_errors', 1);
  //ini_set('display_startup_errors', 1);
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  define('SMARTY_DIR', $root_abs.'libs/');
  require_once(SMARTY_DIR.'Smarty.class.php');

  session_start();

  /** Smarty configuration */
  $smarty = new Smarty();
  $smarty->force_compile = true;
  $smarty->caching = false;
  $smarty->cache_lifetime = -1;
  $smarty->debugging = true;

  $smarty->assign("root", $root);


?>
