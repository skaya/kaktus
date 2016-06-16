<?php

$success = 0;
$errors = array();
$fields = ['name', 'email', 'message'];

foreach ($fields as $field) {
	$_POST[$field] = trim($_POST[$field]);
	if ($_POST[$field] == '') {
		array_push($errors, "Enter your ".$field);
	}
}

if (!ereg(".+@.+\..+", $_POST['email']) &&  $_POST['email']!='') {
	array_push($errors, 'Enter valid e-mail');
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
}

$response = array();
$response["success"] = $success;
$response["errors"] = $errors;
echo json_encode($response);
header('Content-Type: application/json');

