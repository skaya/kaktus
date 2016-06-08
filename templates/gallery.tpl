<div id="fp_gallery">
    <div id="fp_exit" class="fp_exit"></div>
    <div id="fp_next" class="fp_next"></div>
    <div id="fp_prev" class="fp_prev"></div>
    <div id="fp_stop" class="fp_play"></div>
    <div id="fp_play" class="fp_play"></div>
    <img src="{$photo[0].picture_origin}" alt="" class="fp_preview"/>
    <div id="outer_container">
        <div id="fp_thumbtoggle" class="fp_thumbtoggle"><span>&nbsp;</span></div>
        <div id="thumbScroller">
            <div class="content-wrapper">
            <div class="container">
                {section loop=$photo name=i}
                    <div class="content">
                        <div class="content-img">
                        <a href="#">
                            <div class="bgThamb"></div>
                            <img src="images/origin/{$photo[i].picture}" alt="" class="thumb" />
                        </a>
                        </div>
                    </div>
                {/section}
            </div>
            </div>
        </div>
    </div>
</div>
