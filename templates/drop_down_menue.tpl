<div class="portfolio-menu">
	{foreach from=$top_menue item=item}
		<div class="portfolio-menu__item {if $item.id==$page.id}active{/if}" id="menu{$item.id}">
			{$item.menue}
			<div class="portfolio-menu__dropdown">
				  <div class="portfolio-menu__scrollable-wrapper">
						{if $item.array.0!=''}
							{assign var=s value=0}
							{foreach from=$item.array item=item2}
								{assign var=s value=$s+1}
					      		<div class="portfolio-menu__subitem" id="{$s}">
									<a class="portfolio-menu__icon-box" id="{$item2.id}" href="gallery-{$item2.id}.html" title="{$item2.title}">
										<img src="images/sm/{$item2.icon}" class="portfolio-menu__icon-img"/>
									</a>
									<div class="portfolio-menu__subitem-info-box">
										<div class="portfolio-menu__subitem-text">
											<h4>
												{$item2.menue}<br>
												<small>{$item2.count} photos</small>
											</h4>
											<p class="desc">{$item2.descr_page}</p/>
											<small>{$item2.data_album}</small>
										</div>
									</div>
					      		</div>
							{/foreach}

						{/if}
				  </div>

			</div>
		</div>
	{/foreach}
</div>
