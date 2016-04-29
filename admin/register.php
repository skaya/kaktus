<?php
/**
 * Project:     smarty_ajax: AJAX-enabled Smarty plugins
 * File:        register.php
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://kpumuk.info/ajax/smarty_ajax/
 * @copyright 2006 Dmytro Shteflyuk
 * @author Dmytro Shteflyuk <kpumuk@kpumuk.info>
 * @package smarty_ajax
 * @version 0.1
 */

header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0
require("../common/common.php");
require("common/connect_templates.php");



if (!empty($_POST)) {
  $errors = array();
  if (!isset($_POST['login']) || empty($_POST['login']))
    $errors[] = 'Please, enter your login';
  if (!isset($_POST['password']) || empty($_POST['password']))
    $errors[] = 'Please, enter your password';
  if (!isset($_POST['email']) || empty($_POST['email']))
    $errors[] = 'Please, enter your e-mail';

  if (!empty($errors)) {
    echo 'false';
    foreach ($errors as $error) {
      echo ';' . $error;
    }
    exit;
  }
  echo 'true;You\'ve been successfully registered';
  exit;
}

$smarty->assign('cur_page','main_pages'); 
$smarty->assign('cur_page','main');
$smarty->assign('title', 'Registration Form');
$smarty->assign('messages', array('Please, fill form data'));
$smarty->assign('messages_warning', true);
$smarty->assign('page_template', 'register');
$smarty->assign('left',$smarty->fetch('register.tpl'));
$smarty->display('main.tpl');

?>