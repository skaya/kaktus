<form name="edit_pic" id="edit_pic" method="post" enctype="multipart/form-data" target="upload_target" >
  <input type="hidden" name="garmoshka_set_name" value="{$garmoshka_set_name}" />
  <input type="hidden" name="issue_id" value="{$issue_id}" />
  <input type="hidden" name="page" value="{if $pages_num==''||$pages_num==0}1{else}{$pages_num}{/if}" />
  <input type="hidden" name="pic_id" value="{$name.id}" />
  <input type="hidden" name="upload_type" value="image" />

  {section loop=$langs name=l}
		{assign var=field value=name_$langs[l]}
		<input type="text" name="{$name.id}name_{$langs[l]}"  id="{$name.id}name_{$langs[l]}" size="30" value="{$name.$field}" class="text_box" style="background-image:url(admin_img/flags/{$langs[l]}.gif)"/>
	{/section}

	<input type="button" name="submitBtn" value="Обновить" class="mini_save" onclick="SmartyAjax.update('text_discr{$name.id}', 'garmoshka.php', 'get', 'part=pics&issue_id={$issue_id}&id={$name.id}&garmoshka_set_name=page&table={$table}&pic_id={$name.id}'+{section loop=$langs name=l}{assign var=field value=name_$langs[l]}'&name_{$langs[l]}='+document.getElementById('{$name.id}name_{$langs[l]}').value+{/section}'&f=save_pic_name'); " />
</form >
