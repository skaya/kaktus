 {$page.text}
<table class="catalog" cellpadding="0" cellspacing="0" width="100%">
  {assign var=i value=-1}
  {section loop=$objects name=me}
  <tr>
    {if $objects[me].picture_sm!=''}<td>{if $objects[me].long_descr!=''}<a href="portfolio-{$objects[me].id}-{$page.id}-{$lang}.html" title="{$objects[me].title}">{/if}<img src="{$objects[me].picture_sm}" alt="{$objects[me].title}" border="0"/>{if $objects[me].long_descr!=''}</a>{/if}{else}&nbsp;</td>{/if}
   
    <td {if $objects[me].picture_sm==''}colspan="2"{/if}> 
    <h2>{$objects[me].title}</h2>
    {$objects[me].short_descr}
    {if $objects[me].price!=''}<div>Стоимость: {$objects[me].price}</div>{/if}
    {if $objects[me].file!=''}<div><a href="{$objects[me].file}" title="{$objects[me].title}">Скачать файл</a></div>{/if}
      {if $objects[me].long_descr!=''}
      <div><a {if $objects[me].same==1} onclick="show_me('long{$objects[me].id}')"{else}href="portfolio-{$objects[me].id}-{$page.id}-{$lang}.html"{/if} title="{$objects[me].title}">Подробнее</a></div>
      {if $objects[me].same==1}<div style="display:none" class="long_descr" id="long{$objects[me].id}">{$objects[me].long_descr}</div>{/if}
      {/if} </td>
  </tr>
  {/section}
</table>
