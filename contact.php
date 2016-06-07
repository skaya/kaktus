<?php
$success = 0;
$errors = array();
$fields = ['name', 'email', 'message'];

foreach ($fields as $field) {
	$_REQUEST[$field] = trim($_REQUEST[$field]);
	if ($_REQUEST[$field] == '') {
		array_push($errors, "Enter your ".$field);
	}
}

if (!ereg(".+@.+\..+", $_REQUEST['email']) &&  $_REQUEST['email']!='') {
	array_push($errors, 'Enter valid e-mail');
}

if($_SESSION['string'] != md5($_REQUEST['captcha'])) {
	array_push($errors, 'The captcha is not valid');
}

//==============Sending message to email===================
if (count($errors)==0) {
	$errors = array();
	$errors[] = 'Message is successfully sent!';
	$success = 1;

	if ($extras['mail']!='') {
		$to = $extras['mail'];
	} else {
		$to = 'knpyul@gmail.com';
	}

	$subject = 'Message from KAKTUS';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$message = file_get_contents('templates/email.html');

	mail($to, $subject, $message, $headers);

	foreach ($fields as $field) {
		$_REQUEST[$field] = '';
	}
}

$smarty->assign('errors', $errors);
$smarty->assign('success', $success);
$smarty->assign('name', $_REQUEST['name']);
$smarty->assign('email', $_REQUEST['email']);
$smarty->assign('message', $_REQUEST['message']);

$smarty->assign('contact', $smarty->fetch('contact_form.tpl'));

?>
