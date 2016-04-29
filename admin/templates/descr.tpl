{ajax_form method="post" id="form_descr" url=check_descr.php callback="me()" }
<input type="hidden" name="issue_id" value="{$data.id}" />
<div class="text_discr" >Описание: </div>
{section loop=$langs name=l}
{assign var=field value=meta_descr_$langs[l]}
<textarea name="meta_descr_{$langs[l]}"  class="text_form" style="background-image:url(admin_img/flags/{$langs[l]}.gif)">
{$data[$field]}</textarea>
{/section}

<div class="text_discr" >Ключевые слова: </div>
{section loop=$langs name=l}{assign var=field value=keywords_$langs[l]}
<textarea name="keywords_{$langs[l]}"  class="text_form" style="background-image:url(admin_img/flags/{$langs[l]}.gif)">
{$data[$field]}</textarea>
{/section}
                <div><input type="submit"  value="Cохранить" class="mini_save" /></div> 

{/ajax_form}
