<?php
	require("common/common_scripts.php"); 

	$page['title']="Отправить заявку";
	$smarty->assign('page',$page);

	$land = array();
	$query = mysql_query('select id,name,logo from '.$db_prefics.'land',$DB);
	while ($row = mysql_fetch_assoc($query)) {
		$land[] = $row;
	}

	$type = array();
	$query = mysql_query('select id,name from '.$db_prefics.'tour',$DB);
	while ($row = mysql_fetch_assoc($query)) {
		$type[] = $row;
	}

	$tour = array();
	$query = mysql_query('select id,menue from '.$db_prefics.'pagetours',$DB);
	while ($row = mysql_fetch_assoc($query)) {
		$tour[] = $row;
	}
	
	$smarty->assign('land',$land);
	$smarty->assign('type',$type);
	$smarty->assign('tour',$tour);

session_start();
if ($_REQUEST['action'] == 'send') {
	$errors = array();
	if ($_REQUEST['name'] == '') {
		$errors[] = "Вы забыли представиться.";
	}
	if ($_REQUEST['email'] == '') {
		$errors[] = "Напишите нам свой e-mail, иначе как же мы сможем Вам ответить?";
	}
	if (!ereg(".+@.+\..+", $_REQUEST['email'])&& $_REQUEST['email']!='') {
		$errors[] = "Вы ввели некорректный e-mail.";
	}
	if($_SESSION['string'] != md5($_REQUEST['pass'])) {
		$errors[] = "Вы ввели неверный пароль.";
	}
	
	if ($errors == NULL) {
/*		mysql_query("insert into ".$db_prefics."faq (quest,name,mail) values (
					'".$_REQUEST['quest']."',
					'".$_REQUEST['name']."',
					'".$_REQUEST['mail']."')",$DB);
		print mysql_error();*/
//==================================Отправка письма==============================
/*		$mail = '';
		function get_data($smtp_conn) {
			$data="";
			while($str = fgets($smtp_conn,515)) {
				$data .= $str;
				if(substr($str,3,1) == " ") { break; }
			}
			return $data;
		}
		
		$header="Date: ".date("D, j M Y G:i:s")." +0700\r\n"; 
		$header.="From: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode($_REQUEST['name'])))."?= <".$_REQUEST['mail'].">\r\n"; 
		$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n"; 
		$header.="Reply-To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode($_REQUEST['name'])))."?= <".$_REQUEST['mail'].">\r\n";
		$header.="X-Priority: 3 (Normal)\r\n";
		$header.="Message-ID: <172562218.".date("YmjHis")."@mail.by>\r\n";
		$header.="To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('Администратор')))."?= <".$mail.">\r\n";
		$header.="Subject: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('новый вопрос')))."?=\r\n";
		$header.="MIME-Version: 1.0\r\n";
		$header.="Content-Type: text/html; charset=windows-1251\r\n";
		$header.="Content-Transfer-Encoding: 8bit\r\n";
		
		$text='<table border=0>
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Имя</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['name'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Телефон</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['phone'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>E-mail</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['email'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Тур</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['tour_s'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Страна</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['land_s'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Тип</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['type_s'].'&nbsp;</td>
					</tr>	
					<tr>
						<td align="right" bgcolor="#999999">&nbsp;<b>Доп.информация</b>&nbsp;</td>
						<td bgcolor="#CCCCCC">&nbsp;'.$_REQUEST['text'].'&nbsp;</td>
					</tr>	
				</table>';
		
		$smtp_conn = fsockopen("mail.mail.by", 25,$errno, $errstr, 10);
		if(!$smtp_conn) {fclose($smtp_conn); exit;}
		$data = get_data($smtp_conn);
		
		fputs($smtp_conn,"EHLO mail.by\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 250) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,"AUTH LOGIN\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 334) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,base64_encode("mkl@mail.by")."\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 334) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,base64_encode("123456")."\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 235) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,"MAIL FROM:mkl@mail.by\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 250) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,"RCPT TO:".$mail."\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 250 AND $code != 251) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,"DATA\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 354) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
		$code = substr(get_data($smtp_conn),0,3);
		if($code != 250) {fclose($smtp_conn); exit;}
		
		fputs($smtp_conn,"QUIT\r\n");
		fclose($smtp_conn);*/
//===============================================================================	
		$errors[] = "Заявка отправлена";
	} else {
		$smarty->assign('name',$_REQUEST['name']);
		$smarty->assign('email',$_REQUEST['email']);
		$smarty->assign('phone',$_REQUEST['phone']);
		$smarty->assign('text',$_REQUEST['text']);
		$smarty->assign('tour_ss',$_REQUEST['tour_s']);
		$smarty->assign('land_ss',$_REQUEST['land_s']);
		$smarty->assign('type_ss',$_REQUEST['type_s']);
	}
}
$smarty->assign('error',$errors);

$smarty->assign('content', $smarty->fetch('content.tpl'));

require("common/common_end_scripts.php"); 
?>