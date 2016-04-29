{if $pages_num>1}{assign var=issue_id value=$smarty.get.issue_id}{assign var=i value=1}
{section loop=$pages_num name=pages}
{if $i>1} |{/if} <a href="#" onclick="{ajax_update update_id="garmoshka" function="show" url="garmoshka.php"  params="id=$id&part=$to_update&issue_id=$issue_id&page=$i&garmoshka_set_name=$garmoshka_set_name"}">{$i}</a>{assign var=i value=$i+1}
{/section}
{/if}