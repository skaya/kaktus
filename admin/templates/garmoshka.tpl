<ul style="" id="garm">
	{assign var=issue_id value=$smarty.get.issue_id}
	{assign var=id value=$smarty.get.id}
  {foreach key=key item=item from=$garmoshka_set}
		{assign var=part value=$garmoshka_set[$key].tpl }
    <li>
			<input type="button"  class="garm"  value="{$item.name}" onclick="{ajax_update update_id="garmoshka" function="show" url="garmoshka.php" params="part=$part&issue_id=$issue_id&id=$id&garmoshka_set_name=$garmoshka_set_name"}">
			<div id="{$part.tpl}.tpl" >
				{if $show_tpl==$item.tpl}{include file="$part.tpl" garmoshka_set_name=$garmoshka_set_name}{/if}
			</div>
		</li>
  {/foreach}
</ul>
