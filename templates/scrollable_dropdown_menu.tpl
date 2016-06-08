<div class="scrollable-dropdown-menu">
    {foreach from=$drop_down_menu item=item}
        <div class="scrollable-dropdown-menu__item {if $item.id==$page.id}active{/if}" id="menu{$item.id}">
            {$item.menue}
            <div class="scrollable-dropdown-menu__dropdown-container">
                  <div class="scrollable-dropdown-menu__scrollable-wrapper">
                        {if $item.array.0!=''}
                            {assign var=s value=0}
                            {foreach from=$item.array item=item2}
                                {assign var=s value=$s+1}
                                  <div class="scrollable-dropdown-menu__scrollable-item" id="{$s}">
                                    <a class="scrollable-dropdown-menu__icon-container" id="{$item2.id}" href="gallery-{$item2.id}.html" title="{$item2.title}">
                                        <img src="images/sm/{$item2.icon}" class="scrollable-dropdown-menu__icon-img"/>
                                    </a>
                                    <div class="scrollable-dropdown-menu__text-container">
                                        <div class="scrollable-dropdown-menu__text">
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
