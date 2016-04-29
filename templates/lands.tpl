
<ul class="list_lands">
{section loop=$lands name=item}
<li>
	<a href="page-showland-{$lands[item].id}.html"  target="_self" title="{$lands[item].name}">{$lands[item].name}</a> <sup><img src="{$lands[item].logo}" alt="{$lands[item].name}" style="border:1px solid #CCCCCC;" /></sup>
</li>
{/section}
</ul>
