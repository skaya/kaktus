
<table width="640" align="center" cellpadding="0" cellspacing="0" > 
  <form name="page_templ" action="extras.php" method="post">  
  <input name="action" type="hidden" value="save" />
  <input name="issue_id" type="hidden" value="{$pages.id}" />

  <tr>
    <td  align="center"><h1>Редактирование колонтитула {$pages.descr}</h1></td>
  </tr>
  <tr>
    <td  align="center">
	{if $pages.spaw==1}
		{$page_text}
	{else}
   {section loop=$langs name=l}{assign var=field value=text_$langs[l]}
                    	<input type="text" class="text_box5" name="text_{$langs[l]}"  value="{$pages.$field|escape}"  style="background-image:url(admin_img/flags/{$langs[l]}.gif)" size="300"/>
                        {/section}
	
	{/if}	
	</td>
    </tr>
	  <tr>
	    <td align="center"><input name="submitA" type="submit" value="Сохранить"  id="save_but2"/></td>
    </tr>
</form>
    </table>