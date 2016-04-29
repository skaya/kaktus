<?php


if ($_REQUEST['action'] == 'add_msg') {
	//include("common/send_msg.php");
	$errors = array();
	$_REQUEST['name'] = trim($_REQUEST['name']);
	$_REQUEST['email'] = trim($_REQUEST['email']);
	$_REQUEST['msg'] = trim($_REQUEST['msg']);
	if ($_REQUEST['name'] == '') {
		$errors[] = 'Введите имя';
	}
	if ($_REQUEST['email'] == '') {
		$errors[] = 'Введите e-mail';
	}
	if (!ereg(".+@.+\..+", $_REQUEST['email'])&& $_REQUEST['email']!='') {
		$errors[] = 'Некорректный e-mail';
	}
	if ($_REQUEST['msg'] == '') {
		$errors[] = 'Введите сообщение';
	}
	if($_SESSION['string'] != md5($_REQUEST['kod'])) {
		$errors[] = 'Неверный код';
	}



if (count($errors)==0) {
	$errors[] = 'Сообщение отправлено!';
	$_REQUEST['send'] = 1;
//==================================Отправка письма==============================
	$num = 1;
	if($extras['mail']!='') {
		$root_mail=$extras['mail'];
	}


		// несколько получателей
		$to  = $root_mail; // обратите внимание на запятую

		// тема письма
		$subject = 'Сообщение с KAKTUS';

		// текст письма
		$message = '
		<html>
		<head>
			<title>Сообщение с KAKTUS</title>
		</head>
		<body>
			<h1 style="color:#469b5a; font-size: 18px; margin-bottom: 20px;">Сообщение с KAKTUS</h1>
			<table cellpadding="0" cellspacing="0" width="50%" style="margin-bottom: 30px;">
				<tr>
					<td style="color:#469b5a; padding: 10px; border-top: 1px solid #469b5a;" align="left">&nbsp;<b>Имя</b>&nbsp;</td>
					<td align="center" style="color:#469b5a; padding: 10px; border-top: 1px solid #469b5a;">&nbsp;'.$_REQUEST['name'].'&nbsp;</td>
				</tr>
				<tr>
					<td style="color:#469b5a; padding: 10px;" align="left">&nbsp;<b>E-mail</b>&nbsp;</td>
					<td align="center" style="color:#469b5a; padding: 10px;">&nbsp;'.$_REQUEST['email'].'&nbsp;</td>
				</tr>

				<tr>
					<td style="color:#469b5a; padding: 10px; border-bottom: 1px solid #469b5a;" align="left">&nbsp;<b>Сообщение</b>&nbsp;</td>
					<td align="center" style="color:#469b5a; padding: 10px; border-bottom: 1px solid #469b5a;">&nbsp;'.$_REQUEST['msg'].'&nbsp;</td>
				</tr>
			</table>
		</body>
		</html>
		';

		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Дополнительные заголовки
		//$headers .= 'To: '.$_REQUEST['email']. "\r\n";
		$headers .= 'From: kaktus.co '.$root_mail. "\r\n";
		//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

		// Отправляем
		mail($to, $subject, $message, $headers);

		$_REQUEST['email'] = '';
		$_REQUEST['name'] = '';
		$_REQUEST['msg'] = '';

//==============================================================================

	}
}

$smarty->assign('errors',$errors);
$smarty->assign('name',$_REQUEST['name']);
$smarty->assign('send',$_REQUEST['send']);
$smarty->assign('email',$_REQUEST['email']);
$smarty->assign('msg',$_REQUEST['msg']);


$smarty->assign('contact',$smarty->fetch('contact.tpl'));

?>