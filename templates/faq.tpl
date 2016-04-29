
<h1 style="padding-left:10px">Часто задаваемые вопросы</h1>
{section loop=$faq name=f}
<ul class="faq" onclick="faq_show('answ{$faq[f].id}');" style="cursor:pointer">
	<li>
	<div>{$faq[f].quest}</div>
	<ul id="answ{$faq[f].id}" style="display:none;">
		<li>
		<div>{$faq[f].answer}</div>
		</li>
	</ul>
	</li>
</ul>
{/section}
{if $quest_add == '1'}
<h1>&nbsp;Ваш вопрос успешно отправлен.</h1>
<h3>&nbsp;&nbsp;&nbsp;<a href="faq.html">Задать еще вопрос</a></h3>
{else}
<form action="faq.html" name="faq" method="post">
<input type="hidden" name="action" value="send_quest" />
<input type="hidden" name="issue_id" value="{$id}" />
<h1 style="padding-left:10px">Задайте нам свой вопрос</h1> 
{if $error!=''}
{$error.0}
{/if}
<table border="0" class="guest">
  <tr>
    <th align="right"><strong>Представьтесь:</strong></th>
    <td colspan="2">
        <input name="name" type="text" size="50" value="{$name}" />    </td>
  </tr>
  <tr>
    <th align="right"><strong>Ваш e-mail:</strong></th>
    <td colspan="2"><input name="mail" type="text" size="50" value="{$mail}" /></td>
  </tr>
  <tr>
    <th colspan="3" align="center" valign="top"><strong>Вопрос или комментарий:</strong></th>
    </tr>
  <tr>
    <th colspan="3" align="center" valign="top">
      <textarea name="quest" cols="80" rows="10" >{$quest}</textarea>    </th>
    </tr>
  <tr height="30">
    <td align="right" valign="middle"><strong>Введите защитный код:</strong></td>
    <td width="30%" align="left" valign="middle"><input type="text" name="pass" />    </td>
    <td align="left" valign="bottom"><img src="common/assign.php" width="100" height="30" class="hr"/></td>
  </tr>
  
  <tr>
    <th colspan="3" align="center" valign="top"><label>
      <input type="submit" name="Submit" value="Отправить" class="bl" />
    </label></th>
    </tr>
</table>
</form>
{/if}