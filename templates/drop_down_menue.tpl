<div class="portfolio-menu">
	{foreach from=$top_menue item=item}
		<div class="portfolio-menu__item {if $item.id==$page.id}active{/if}" id="menu{$item.id}">
			{$item.menue}
			<div class="catalog-scrolling-menu bgPhotos">
				  <div class="scrollableArea">
						{if $item.array.0!=''}
							{assign var=s value=0}
							{foreach from=$item.array item=item2}
								{assign var=s value=$s+1}
					      		<div class="imgBlock" id="{$s}">
									<a class="img" id="{$item2.id}" href="gallery-{$item2.id}.html" title="{$item2.title}">
										<div class="bgPhoto"></div>
										<img src="images/sm/{$item2.icon}"/>
									</a>
									<div class="info right">
										<div>
											<span>
												<span class="title">{$item2.menue}</span>
												<br/><br/>
												<span class="desc">{$item2.descr_page}</span><br/>
												<span class="kol">{$item2.count} photos</span>
											</span><br/><br/>
											{$item2.data_album}
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
