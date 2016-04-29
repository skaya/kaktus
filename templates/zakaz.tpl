
 {$content}
     
        
<div class="form-zakaz">
    	<p id="h1">{if $page.id=="873"} {if $lang==ru}Форма обратной связи{/if}{if $lang==de}Feedback{/if}{if $lang==en}Feedback{/if}{if $lang==it}Contattaci{/if}{else}{if $lang==ru}Форма заявки{/if}{if $lang==de}Anmeldungsformular{/if}{if $lang==en}Order{/if} {if $lang==it}Richiesta preventivo {/if}{/if}</p>

<form action="zakaz-{$page.id}-{$lang}.html" name="add_msg" method="post" >
{section loop=$errors name="nn"}
<div class="message_error">
{$errors[nn]}
</div> 
 {/section}         
<input type="hidden" name="action" value="order" />

    <table class="zakaz" cellpadding="0" cellspacing="0" border="0">
	
	{*
	type 0= text
	type 10= email
	type 1=textarea
	type 2=chechbox
	type 3=listcontainer
	type 31=listelement
	type 4=radiocontainer
	type 41=radiobutton	
	type 5=код протекции
	type 6=код примечание
	*}
{foreach key=key item=item from=$fields}
{section name=ff loop=1}	
{if $item.if_show==1}
<tr><td class="text {if $item.type==6}comm{/if}" {if $item.type==6}colspan="2"{/if}>{$item.name}{if $item.must}*{/if}{if $item.type!=6}:{/if}</td>

 {if $item.type!=6}
<td class="one">{/if}
{if $item.type==0|| $item.type==10}
<input type="text"   name="{$item.id}" value="{$item.default_v}"/>
{/if}


{if $item.type==1}
<textarea  name="{$item.id}">{$item.default_v}</textarea>
{/if}

{if $item.type==2}
<input type="checkbox"   name="{$item.id}" value="{$item.default_v}" {if $item.default_v==1}checked="checked"{/if}/>
{/if}

{if $item.type==3}
<select name="{$item.id}">
{include file="options_list.tpl" fields=$item.children parent=$item} 
</select>
{/if}

{if $item.type==4}

{include file="radio_list.tpl" fields=$item.children parent=$item} 

{/if}

{if $item.type==5}

<img src="common/assign.php"/>
<input type="text"   name="{$item.id}" value="{$item.default_v}"/>

{/if}
 {if $item.type!=6}
</td>
{/if}
</tr>

{/if}
{/section}
{/foreach}
<tr><td class="bot"><input type="submit" class="buttom" value="{if $lang==ru}Отправить{/if}{if $lang==it}Invia{/if}{if $lang==de}übermitteln{/if}{if $lang==en}submit{/if}" /></td></tr>

</table>
</form>
    </div>