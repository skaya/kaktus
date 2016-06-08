<ul class="article-menu">
	{section name=foo loop=$article_menu}
		<li class="article-menu__item clearfix {if $article_menu[foo].id==$page.id}active{/if}">
            <span class="article-menu__name">{$article_menu[foo].menue}</span>
			<a href="{$article_menu[foo].link|replace:".php":""}-{$article_menu[foo].id}.html" id="{$article_menu[foo].id}" class="article-menu__link">
                {$article_menu[foo].menue}
            </a>

		</li>
	{/section}
</ul>
