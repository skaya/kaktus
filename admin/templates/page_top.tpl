<div class="top-page-fields">
  <input name="action" type="hidden" value="save_page" />
  <input name="issue_id" type="hidden" value="{$pages.id}" />
  <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
  <div class="text_discr" >Пункт меню:</div>
  {section loop=$langs name=l}{assign var=field value=menue_$langs[l]}
  <input type="text"  name="menue_{$langs[l]}" id="menue_{$langs[l]}" size="300" value="{$pages.$field |escape}" class="text_box5" style="background-image:url(admin_img/flags/{$langs[l]}.gif)" />
  {/section}
  <div class="text_discr" >Заголовок:</div>
  {section loop=$langs name=l}
  {assign var=field value=title_$langs[l]}
  <input type="text" class="text_box5" name="title_{$langs[l]}" id="title_{$langs[l]}"  value="{$pages.$field|escape}" size="300" style="background-image:url(admin_img/flags/{$langs[l]}.gif)"/>
  {/section}
</div>

