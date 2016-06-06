{strip}
<div id="navigation-block">
    <ul id="sliding-navigation">
		{section name=foo loop=$selected_menue}
			<li class="sliding-element {if $selected_menue[foo].id==$page.id}select{/if}">
				<div><a href="{$selected_menue[foo].link|replace:".php":""}-{$selected_menue[foo].id}.html" id="{$selected_menue[foo].id}" id="{$selected_menue[foo].id}">{$selected_menue[foo].menue}</a></div>
			</li>
		{/section}
    </ul>
</div>
{/strip}
