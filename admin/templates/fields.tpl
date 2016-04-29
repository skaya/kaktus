
<h1>Поля форм</h1>

<center>
<table  border="0" align="center">	

{section loop=$list name=item}
<tr>
    <td width="250px"><a href="fields.php?action=edit&amp;issue_id={$list[item].id}" class='text_sub_menue'> {$list[item].name_ru}</a></td>
    <td width="50px">
    <a href="fields.php?action=edit&&issue_id={$list[item].id}" class='text_sub_menue'><img src="admin_img/edit.gif" alt="редактировать" width="16" height="16" /> </a>
    <a href="javascript:simple_check('{$cont[i].fio}', 'fields.php?action=delete&issue_id={$list[item].id}');" target="_self"  class="sub_menue" title="удалить"><img src='admin_img/del.png' width="16" height="16"></a>	
    </td>
</tr>
{/section}
</table>
</center>
<form name="field" action="fields.php">
<input type="hidden" name="action" {if $pages.id!=''}value="save"{else}value="insert"{/if}>
<input type="hidden" name="issue_id" value="{$pages.id}">
  {section loop=$langs name=l}{assign var=field value=name_$langs[l]}
  <input type="text"  name="name_{$langs[l]}"  id="name_{$langs[l]}" size="300" value="{$pages.$field |escape}" class="text_box5" style="background-image:url(admin_img/flags/{$langs[l]}.gif)" /> 
{/section}
Выберите тип:
<select name="type">
<option  value=0 {if $pages.type==0}selected="selected"{/if}>text</option>
<option  value=10 {if $pages.type==10}selected="selected"{/if}>Email</option>
<option  value=1  {if $pages.type==1}selected="selected"{/if}>textarea</option>
<option  value=2  {if $pages.type==2}selected="selected"{/if}>chechbox</option>
<option  value=3  {if $pages.type==3}selected="selected"{/if}>Список - родительский элемент</option>
<option  value=31  {if $pages.type==31}selected="selected"{/if}>Элемент списка</option>
<option  value=4  {if $pages.type==4}selected="selected"{/if}>Radio - родительский элемент</option>
<option  value=41  {if $pages.type==41}selected="selected"{/if}>Radio - элемент</option>
<option  value=5  {if $pages.type==5}selected="selected"{/if}>Код протекции</option>
<option  value=6  {if $pages.type==6}selected="selected"{/if}>Примечание</option>
</select>

Родительский пункт<br>
<input type="radio"   name="parent_id" value="0" align="left" {if $pages.parent_id==0}checked="checked"{/if} />Нет<br/>
{section loop=$radios name=r}

<input type="radio"   name="parent_id" value="{$radios[r].id}" align="left" {if $radios[r].id==$pages.parent_id}checked="checked"{/if} />{$radios[r].name_ru}<br/>
{/section}

<!--
<select name="parent_id>"
{section loop=$options name=op}
<option  value="0" {if $pages.parent_id==0}selected="selected"{/if} />Нет</option>
<option  value="{$options[op].id}" {if $options[op].id==$pages.parent_id}selected="selected"{/if} />{$options[op].name_ru}</option>
{/section}
</select>
-->


<input type="submit" value="сохранить">
</form>
