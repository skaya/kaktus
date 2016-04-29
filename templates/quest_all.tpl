


		
		<table border="0" cellpadding="0" cellspacing="0">

	{section loop=$quest name=i}
    {if $quest[i].name!=''}
		<tr>
			<td class="quest"><b>{$quest[i].name},&nbsp;<font size="-9">{$quest[i].date}</font></b></td>
		</tr>
		<tr>
			<td class="questMsg">{$quest[i].text}</td>
		</tr>
		{if $quest[i].answer != NULL}
		<tr>
			<td bgcolor="#CCCCCC"><font color="#344F7D">{$quest[i].answer}</font></td>
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
					<a href="quest-{$i}-{$issue_id}.html" class="quest">{$i}</a>
				{/if}
			{/foreach}
			</td>
		</tr>{/if}
</table>

<div class="form-zakaz">
<p id="h1">Задать вопрос</p>

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