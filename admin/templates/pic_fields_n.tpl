{assign var=id value=$name.id}
<span onclick="{ajax_update update_id=text_discr$id function="pic_edit" url="garmoshka.php" params="id=$id&pic_id=$id&table=$table"}">
{section loop=$langs name=l}{assign var=field value=name_$langs[l]}
{if $p==1 & $name.$field!=''}/
{/if}{$name.$field}{assign var=p value=1}
{/section}
</span>