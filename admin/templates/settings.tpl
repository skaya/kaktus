
<h1>Настройки отображения информации</h1>
{$message}
<table width="100%" > 
  <form name="settings" action="settings.php" method="post">  
  <input name="action" type="hidden" value="save" />
  {section name=set loop=$settings}
  <tr><th align="right">{$settings[set].title}</th>
  <td>{if $settings[set].name==menue_type}
  <select name="{$settings[set].name}">
  <option value="1" {if $settings[set].value==1}selected{/if}>Обычное</option>
  <option value="2" {if $settings[set].value==2}selected{/if}>Выпадающее</option>
  </select>
  
  {else}<input type="text"  name="{$settings[set].name}" value="{$settings[set].value}" size="50%"/>{/if}</td></tr>	  
	{/section}
	<tr><td colspan="2" align="center"><input type="submit" value="сохранить изменения" /></td>
	</tr>
</form>
    </table>
