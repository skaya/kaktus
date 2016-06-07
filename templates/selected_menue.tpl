<ul class="article-menu">
	{section name=foo loop=$selected_menue}
		<li class="article-menu__item clearfix {if $selected_menue[foo].id==$page.id}active{/if}">
            <span class="article-menu__name">{$selected_menue[foo].menue}</span>
			<a href="{$selected_menue[foo].link|replace:".php":""}-{$selected_menue[foo].id}.html" id="{$selected_menue[foo].id}" class="article-menu__link">
                {$selected_menue[foo].menue}
            </a>

		</li>
	{/section}
</ul>
