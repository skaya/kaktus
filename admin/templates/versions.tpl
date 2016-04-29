<ul>{section loop=$data name=item}
<li>

<a href="{$data[item].link}?page_id={$data[item].page_id}&issue_id={$data[item].id}">
{section loop=$langs name=l}{assign var=field value=menue_$langs[l]}{if $s==1&$data.$field!=''}/{/if}{$data[item].$field}{assign var=s value=1}{/section}</a> <small>{$data[item].author} | {$data[item].time}</small> 
</li>
{/section}
</ul>