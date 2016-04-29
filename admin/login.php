<?
require("../common/common.php");
session_start();
if($_REQUEST['action']=="login")
{ 
	if ($_REQUEST['login']!=''&&isset($_REQUEST['login']))
	{
//		echo "SELECT id FROM ".$db_prefics."users WHERE login = '".$_REQUEST['login']."'";

	
		$result=$DB->selectRow("SELECT id,pass FROM ?_users WHERE login=?",$_REQUEST['login']);
		if ($result['pass']!=$_REQUEST['pass'])
		{
			$error="Введен неверный логин или пароль, попробуйте еще раз";
		}
		else 
		{
			unset($_SESSION["loginkl82"]);
			$_SESSION['loginkl82']="admin";
			unset($_SESSION["id"]);
			$_SESSION['id_loginkl82']=$result['id'];
			header("location:index.php");
			exit();
		}
	}	
	else 
	{
		$error="Введен неверный логин или пароль, попробуйте еще раз";
	}

//	if($_REQUEST['login']=="admin"&&$_REQUEST['pass']=="pass")
//	{
//		unset($_SESSION["admin"]);
//		$_SESSION['admin']="admin";
//		header("location:index.php");
//		exit();
//	}
//	else if($b['pass']==$_REQUEST["pass"]&$_REQUEST["pass"]!="")
//	{
//		unset($_SESSION['comp_id']);
//		$comp_id=$b['id'];
//		$_SESSION['comp_id']=$comp_id;
//		header("location:index.php");
//		exit();
//	}
//		else
//	{
//		$error="Введен неверный логин или пароль, попробуйте еще раз";
//
//	};
}

if($_REQUEST["action"]=="logout")
{
	unset($_SESSION["log"]);
};

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

	<title>Вход в админку</title>
</head>

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">

<link  href="common/style.css" rel="stylesheet">
<script language="JavaScript">
        <!--
        function prow ()
        {
            if (parent.frames.length>0)
            {
                parent.location.href="login.php";
            } 
        };
        
        //-->
        </script>
<body  onLoad="prow();">
<div id="bg-left"></div>
<div id="bg-right"></div>
<div id="bg-img">
<? if($error):?>

<div align="center"><span class="error"><?=$error?></span></div>

<?endif;?>

<table border="0" cellspacing="0" cellpadding="5" align="center" class="loginTable">

<form action="login.php" method="post">

<input type="hidden" name="action" value="login">

<tr>

  <th colspan="2" >Вход в зону администрирования</th>

</tr>
<tr>

  <td colspan="2" >&nbsp;</td>

</tr>
<tr>

  <td align="right" class="light" ><strong>Логин:</strong></td>

  <td class="light" ><input type="text" name="login" class="inp w2"></td></tr>

<tr>

  <td align="right" class="light"><strong>Пароль:</strong></td>

  <td class="light" ><input type="password" name="pass" class="inp w2"></td></tr>

<tr><td colspan="2" align="right" class="light"><input type="submit" value="Войти" class="inp"></td></tr></form>

</table>
</div>
</body>

</html>
