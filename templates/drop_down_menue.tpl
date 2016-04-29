{foreach from=$top_menue item=item}
	<div class="sub-menu {if $item.id==$page.id}select{/if}" id="menu{$item.id}">
		<h3>{$item.menue}</h3>
		<div class="bgPhotos">
			<div class="scrollTop"></div>
			<div class="scrollWrapper">
			  <div class="scrollableArea">
					{if $item.array.0!=''}
						{assign var=s value=0}
						{foreach from=$item.array item=item2}
							{assign var=s value=$s+1}
				      <div class="imgBlock" id="{$s}">
								<A class="img" id="{$item2.id}" href="{if $item.array[item2].symlink==1} {$item2.link} {else} page-{$item2.id}-{$lang}.html{/if}" title="{$item2.title}">
									<div class="bgPhoto"></div><img src="{$item2.icon}"/>
								</A>
								<div class="info right"><div><span><span class="title">{$item2.menue}</span><br/><br/><span class="desc">{$item2.descr_page}</span><br/><span class="kol">{$item2.kol} photos</span></span><br/><br/>{$item2.data_album}</div></div>
				      </div>
						{/foreach}

					{/if}
			  </div>
			</div>
		</div>
	</div>
{/foreach}
