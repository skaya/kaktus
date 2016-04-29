{ajax_form method="post" id="page_settings" url=check_page_settings.php callback="me()"}
<input name="issue_id" type="hidden" value="{$data.id}">
{foreach key=key item=item from=$parameters}
{assign var=t value=$item.name}

<div  class="text_discr_big {if $item.type=='text'}text{/if}">{if $item.type=='text'}<span>{$item.descr}</span>{/if}<input name="{$item.name}" type="{$item.type}" value="{if $item.type=='checkbox'}1{/if}{if $item.type=='text' && $data.$t!='Array'}{$data[$item.name]}{/if}" {if $data.$t==1}checked="checked"{/if} >{if $item.type!='text'}{$item.descr}{/if}</div>

{/foreach}

<div  class="text_discr_big"><span>Тип: </span><select name="link">
  {section loop=$page_types name=types} 
     <option  value="{$page_types[types].link}" {if $data.link==$page_types[types].link}selected="selected"{/if} />{$page_types[types].name}</option>
     {/section}
</select></div>
<div><input type="submit"  value="сохранить" class="mini_save"/></div>

{/ajax_form}
