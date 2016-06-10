{extends file='layout.tpl'}
{block name=content}
    <div class="top-navigation">
        {$drop_down_menu}
    </div>

    <div class="text-conteiner">
        <div class="text-conteiner__inner">
            <h2>{$page.title}</h2>
            {$page.content}
        </div>
    </div>

    <div class="sidebar-navigation">
        {$article_menu}
    </div>

    <div class="sidebar-contact-form">
        {$contact_form}
    </div>

    <div class="copyright">
        {$extra.footer}
    </div>
{/block}
