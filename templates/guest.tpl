

<h1 class="title">Отзывы</h1>
		
		<table border="0" cellpadding="0" cellspacing="0">

	{section loop=5 name=i}
    {if $guest[i].name!=''}
		<tr>
			<td class="guest"><b>{$guest[i].name},&nbsp;<font size="-9">{$guest[i].date}</font></b></td>
		</tr>
		<tr>
			<td class="guestMsg">{$guest[i].text}</td>
		</tr>
		{if $guest[i].answer != NULL}
		<tr>
			<td bgcolor="#CCCCCC"><font color="#344F7D">{$guest[i].answer}</font></td>
		</tr> 
		{/if}
		<tr><td height="10"></td></tr>
        {/if}
	{/section}
	{if count($num)>1}
		<tr>
			<td align="center" id="name">
			{foreach from=$num item=i}
				{if $i == $page_num}
					{$i}
				{else}
					<a href="guest-{$i}-{$issue_id}.html" class="guest">{$i}</a>
				{/if}
			{/foreach}
			</td>
		</tr>{/if}
</table>
<p><a href="#otz" name="otz" onclick="show_hide('form-zakaz')">Оставить отзыв</a> | <a href="otzyv.html">Все отзывы</a></p>
<div class="form-zakaz" id="form-zakaz">
<p id="h1">Оставить отзыв</p>

		<h3 style="color:#FF0000">{$errors[0]}</h3>
	
<form action="guest.html#name" name="add_msg" method="post">
	<input type="hidden" name="action" value="add_msg" />
	<input type="hidden" name="page_num" value="{$page_num}" />
	<input type="hidden" name="issue_id" value="{$issue_id}" />
	<table  class="zakaz" border="0" cellpadding="0" cellspacing="0">
	<tr><td class="text ">
	
	<strong>Представьтесь:</strong></td>

 <td class="one"><input type="text" name="name" value="{$name}" /> </td></tr>
 <tr><td class="text ">
 <strong>E-mail:</strong></td>

 <td class="one"><input type="text" name="email" id="email" value="{$email}" /></td></tr>
 <tr><td class="text ">Сообщение
<</td>

 <td class="one">
	<textarea name="msg">{$msg}</textarea></td></tr>
 <tr><td class="text ">

	<strong>Введите защитный код:</strong></td>

 <td class="one">
 <img src="common/assign.php" width="100" height="30" align="middle" class="hr"/>
 <input type="text" name="pass" /></td></tr>
<tr><td class="bot">
	<input type="submit" value="Отправить отзыв" name="submit" class="buttom"  /></td></tr>

</table>

</form>
</div>