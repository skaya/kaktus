{ajax_form method="post" id="objects_link" url=check_obj_link.php callback="me()"}{assign var=issue_id value=$smarty.get.issue_id}
<h2>Ссылки на файл {assign var=s value=0}{section loop=$langs name=l}{assign var=field value=title_$langs[l]}{if $s==1&$me.$field!=''}/{/if}{$me.$field}{assign var=s value=1}{/section}</h2>{assign var=id value=$me.id}
<ul>
{section loop=$data_selected name=sel}
<li>{assign var=s value=0}{section loop=$langs name=l}{assign var=field value=menue_$langs[l]}{if $s==1&$data_selected[sel].$field!=''}/{/if}{$data_selected[sel].$field}{assign var=s value=1}{/section}{assign var=link_to value=$data_selected[sel].id}<a onclick="{ajax_update update_id="link_object" function="unlink_file" params="id=$id&part=files&link_to=$link_to&issue_id=$issue_id&garmoshka_set_name=$garmoshka_set_name"};" title="удалить" ><img src='admin_img/unlink.gif' width="18" height="13" >{$issue_id}</a></li>
{/section}
</ul>
<h2>Добавить {$me.title} к страницам</h2>
<ul>
{section loop=$data name=dat}
<li>{assign var=link_to value=$data[dat].id}<a onclick="{ajax_update update_id="link_object" function="link_file" params="id=$id&issue_id=$issue_id&link_to=$link_to&garmoshka_set_name=$garmoshka_set_name"};" href="#" title="добавить" >{assign var=s value=0}{section loop=$langs name=l}{assign var=field value=menue_$langs[l]}{if $s==1&$data[dat].$field!=''}/{/if}{$data[dat].$field}{assign var=s value=1}{/section}<img src='admin_img/link.gif' width="18" height="13" ></a>
</li>
{/section}
</ul>
<div>
{if $pages_num>1}{assign var=issue_id value=$smarty.get.issue_id}{assign var=i value=1}
{section loop=$pages_num name=pages}
{if $i>1} |{/if} <a href="#" onclick="{ajax_update update_id="link_object" function="show_other_file_links" url="garmoshka.php" params="page=$i&id=$id&issue_id=$issue_id&part=files&garmoshka_set_name=$garmoshka_set_name"}">{$i}</a>{assign var=i value=$i+1}
{/section}
{/if}

</div>  
{/ajax_form}
