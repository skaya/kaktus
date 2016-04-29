<html>
<head>
<title>{$title}</title>
<link href="common/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="common/toggle.js"></script>
<script type="text/javascript" src="common/showpng.js"></script>
<script type="text/javascript" src="common/confirm_delete.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<noscript>
<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
</noscript>
{if $check == 0}
<h1>Пользователи</h1>
<table align="center" border="0">	
<tr>
	<td width="16"><a href="users.php?action=add_user" class="sub_menua"><img src='admin_img/add.png' class="sub_menue"></a><br><br></td>
    <td align="left" colspan="2"><a href="users.php?action=add_user" class="sub_menua">Добавить пользователя</a><br><br></td>
</tr>
{section loop=$users name=i}
<tr>
	<td ></td>
	<td  width="90px"><a href="users.php?action=edit&&user_id={$users[i].id}" class='text_sub_menue'> {$users[i].login}</a></td>
	    <td width="50">
		<a href="users.php?action=edit&&user_id={$users[i].id}" class='text_sub_menue'><img src="admin_img/edit.gif" alt="редактировать" width="16" height="16" /></a>
		<a href="javascript:check('{$users[i].login}', 'users.php?action=delete_user&user_id={$users[i].id}');" target="_self"  class="sub_menue" title="удалить юзера"><img src='admin_img/del.png' width="16" height="16"></a>
	</td>
</tr>
{/section}

</table>


{else}
<h1>Редактирование пользователя</h1>
<h1>{$users.login}</h1>
<table width="100%"> 
  <form name="edit_form" action="users.php" method="post" enctype="multipart/form-data">  
  <input name="action" type="hidden" value="save" />
  <input name="user_id" type="hidden" value="{$users.id}" />
  <input name="MAX_FILE_SIZE" type="hidden" value="3000000">
  <tr>
    <td align="center">{if $err==1}Логин некорректный или уже существует.{/if}{if $err==2}Неверный пароль{/if}</td>
  </tr>
  <tr>
    <td align="right">Логин</td>
	<td><input type="text" size="50" name="login" value="{$users.login}" class="text_box"></td>
  </tr>
   <tr>
    <td align="right">Пароль</td>
	<td><input type="password" size="50" name="pass1"  value="{$users.pass}" class="text_box"></td>
  </tr>   
  <tr>
    <td align="right">Повторите пароль</td>
	<td><input type="password" size="50" name="pass2"  value="{$users.pass}" class="text_box"></td>
  </tr>   
   <tr>
  	<td colspan="3" align="right">
		<input name="submitA" type="submit" value="Сохранить" class="orange_but">	</td>
  </tr>
   </form>
</table>
{/if}

</body>
</html>