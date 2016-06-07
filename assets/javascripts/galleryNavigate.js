function galleryNavigate() {
  //current thumb's index being viewed
  var current      = 1,
      autoreplace  = 0,
      totalContent = 0,
      wW = $(window).width(),
      wH = $(window).height(),
      time,
      timer;

  var $btn_thumbs    = $('#fp_thumbtoggle'),
      $thumbScroller = $('#thumbScroller'),
      $loader        = $('#loading_page'),
      $btn_next      = $('#fp_next'),
      $btn_prev      = $('#fp_prev'),
      $btn_play      = $('.fp_play'), //pause and start button
      $btn_start     = $('#fp_play'),
      $btn_stop      = $('#fp_stop'),
      $img           = $('.fp_preview');

  $loader.show();

  hideThumbs(3500);

  positionImg($img, true);

  var load_main_img = 0;

  var tmpPreview = new Image;
  tmpPreview.src = $('.fp_preview').attr('src');

  $(tmpPreview).on('load', function(e){
    load_main_img = 1;
    $('#loading_page').hide();
    $('#fp_gallery').show();
    positionImg($('.fp_preview'));
    showThumbs(2000);
    hideThumbs(2000);
    time = setInterval(function(){play()}, 4000);
  });

  //preload thumbs
  var nmb_thumbs = $thumbScroller.find('.content').length,
      cnt_thumbs = 0;

  $('.thumb').each(function(i, val) {
    $this = $(this);
    var tmpThamb = new Image;
    tmpThamb.src = $this.attr('src');
    thambLoad(tmpThamb, $this);
  });

  function thambLoad(tmp, i) {
    $(tmp).load(function(e) {
      ++cnt_thumbs;
      totalContent+=tmp.width-12;
      //console.log('total-- '+totalContent);

      //console.log("load thamb="+cnt_thumbs);
      //console.log("all thamb="+nmb_thumbs);
      if(cnt_thumbs == nmb_thumbs) {
        //console.log($('#loading_page'));
        //$('#thumbScroller .container').css('width',totalContent);
        // $('#loading_page').hide();
        // $('#fp_gallery').show();
        // positionImg($('.fp_preview'));
        // showThumbs(2000);
        // hideThumbs(2000);
        // setTimeout(function(){play()}, 4000);
      }
    });
  }

  sliderLeft=$('#thumbScroller .container').position().left;

  $('#thumbScroller').mousemove(function(e) { //scroll thamb menu
    if($('#thumbScroller  .container').width()>sliderWidth) {
      var mouseCoords=(e.pageX-80), //80px - padding
          mousePercentX=mouseCoords/sliderWidth,
          destX=-(((totalContent-(sliderWidth))-sliderWidth)*(mousePercentX)),
          thePosA=mouseCoords-destX,
          thePosB=destX-mouseCoords,
          animSpeed=600,
          easeType='easeOutCirc';

      if(mouseCoords==destX) {
        $('#thumbScroller .container').stop();
      } else if(mouseCoords>destX) {
        $('#thumbScroller .container').stop().animate({left: -thePosA}, animSpeed,easeType); //with easing
      } else if(mouseCoords<destX) {
        $('#thumbScroller .container').stop().animate({left: thePosB}, animSpeed,easeType); //with easing
      }
    }
  });

  var fadeSpeed=200;

  $('#thumbScroller  .bgThamb').each(function() {
    $(this).fadeTo(fadeSpeed, 1);
  });

  $('#thumbScroller .bgThamb').hover(
    function() {
      $(this).fadeTo(fadeSpeed, 0);
    },
    function() {
      $(this).fadeTo(fadeSpeed, 1);
    }
  );

  makeScrollable();

  $('#fp_exit').on('click',function(event) {
    exitGallery(event);
  });

  $(document).keydown(function(event) {
    if (event.keyCode ===  27) {
      exitGallery(event);
    }
  });

  if (autoreplace == 0) {
    $btn_next.on('click', function(e) {
      e.preventDefault();
      showNextPrev('next');
    });
    $btn_prev.on('click', function(e) {
      e.preventDefault();
      showNextPrev('prev');
    });
  }

  $btn_stop.on('click', function(e) {
    e.preventDefault();
    pause();
  });

  $btn_start.on('click', function(e) {
    e.preventDefault();
    play();
  });

  $(document).on('click', 'img.fp_preview', function(){
    if (autoreplace == 0) {
      showNextPrev('next');
    }
  });

  $('#outer_container').hover(
    function(){
      showThumbs(500);
    },
    function(){
      hideThumbs(500);
  });

  //clicking on a thumb...
  $thumbScroller.find('.content').on('click',function(e) {
    e.preventDefault();
    autoreplace = 1;
    clearInterval(time);
    wH = $(window).height();
    wW = $(window).width();

    var $content  = $(this),
        $elem     = $content.find('img'),
        $clone    = $elem.clone(),
        $theClone = $clone,
        current   = $content.index()+1,
        pos_left  = $elem.offset().left,
        pos_top   = $elem.offset().top;

    $clone.css({
      'position':'absolute',
      'left': pos_left + 'px',
      'top': pos_top + 'px'
    }).insertAfter($('BODY'));

    var ratio     = $clone.width()/120,
        final_w   = 400*ratio;

    $loader.show();

    $('<img class="fp_preview"/>').load(function(){

      var $newimg     = $(this),
          $currImage  = $('#fp_gallery').children('img:first');

      $loader.hide();

      $clone.stop().css({'z-index': 42}).animate({
        'left': wW/2 + 'px',
        'top': wH/2 + 'px',
        'margin-left' :-$clone.width()/2 -5 + 'px',
        'margin-top': -$clone.height()/2 -5 + 'px',
      }, 500, function() {
        $theClone.animate({
          'opacity'   : 0,
          'top'     : wH/2 + 'px',
          'left'      : wW/2 + 'px',
          'margin-top'  : '-200px',
          'margin-left' : -final_w/2 + 'px',
          'height'    : '400px',
          'width'     : 'auto'
        }, 1000, function() {
          $theClone.remove();
        });

        $currImage.fadeOut(2000, function() {
          $(this).remove();
          autoreplace = 0;
        });

        $newimg.insertBefore($currImage, 2000);
        positionImg($newimg);
        if (!isPause()) {
          time = setInterval(function(){
            play();
          }, 4000);
        }
      });
    }).attr('src',$elem.attr('alt'));
  });

  function positionImg($img, showGallery) {
    var btn_center_y = ($(window).height() - 160)/2,
        img_width,
        img_height,
        img_center,
        img_center_y;

    wW = $(window).width(),
    wH = $(window).height(),

    $('#fp_gallery').height(wH-35+'px').width(wW+'px');
    $('.fp_overlay').height(wH+'px').width(wW+'px');

    if (showGallery) {
      $btn_next.css({right:'-60px', top: btn_center_y});
      $btn_prev.css({left:'-60px', top: btn_center_y});
      $btn_play.css({right:'-60px', top: btn_center_y+45});
    }

    $img.show();

    $img.height('auto');
    $img.width('auto');

    iW = $img.width();
    iH = $img.height();

    if (iW > iH && wW > iW) {
      if (wW/wH >= iW/iH ) {
        // console.log('wW/wH='+wW/wH+' iW/iH='+iW/iH);
        if (iH > wH) {
          $img.height(wH-50+'px').css({height: wH-50+'px'});
        }
        $img.width('auto').css({width: 'auto'});
      } else {
        // console.log('2 wW/wH='+wW/wH+' iW/iH='+iW/iH);
        // console.log('2 iH='+iH+' wH='+wH);
        // console.log('2 wW='+wW);
        if (iW > wW) {
          $img.width(wW-100+'px').css({width: wW-100+'px'});
        }
        $img.height('auto').css({height: 'auto'});
      }
      // console.log('iH='+iH+' iW='+iW);

    } else {
      if (wH/wW <= iH/iW) {
        // console.log('wW/wH='+wW/wH+' iW/iH='+iW/iH);
        if (iH > wH) {
          $img.height(wH-50+'px').css({height: wH-50+'px'});
        }
        $img.width('auto').css({width: 'auto'});
      } else {
        // console.log('2 wW/wH='+wW/wH+' iW/iH='+iW/iH);
        // console.log('2 iH='+iH+' wH='+wH);
        // console.log('2 wW='+wW);
        if (iW > wW) {
          $img.width(wW-100+'px').css({width: wW-100+'px'});
        }
        $img.height('auto').css({height: 'auto'});
      }
    }

    iW = $img.width();
    iH = $img.height();

    img_center = (wW - iW)/2,
    img_center_y = (wH - iH - 30)/2;

    $img.css({left: img_center, top: img_center_y});
    sliderWidth=wW-160; //padding: 0 80px

    showNav();
  }

  function showNextPrev(arrow) { //next\prev mavigate
    clearInterval(time);
    autoreplace = 1;

    if (arrow == 'next') {
      ++current;
    } else {
      --current;
    }

    var $e_next = $thumbScroller.find('.content:nth-child('+current+')');
    if($e_next.length == 0){
      if (arrow == 'next') {
        current = 1;
      } else {
        current = nmb_thumbs;
      }
      $e_next = $thumbScroller.find('.content:nth-child('+current+')');
    }
    $loader.show();
    $('<img class="fp_preview"/>').load(function(){
      var $newimg     = $(this);
      var $currImage    = $('#fp_gallery').children('img:first');
      $newimg.insertBefore($currImage, 2000);
      $loader.hide();
      $currImage.fadeOut(2000,function(){$(this).remove();autoreplace = 0;});
      positionImg($newimg);

      if (!isPause()) {
        time = setInterval(function(){
          play();
        }, 4000);
      }
    }).attr('src',$e_next.find('img').attr('alt'));
  }

  function exitGallery(e) { //close gallery
    e.preventDefault();
    clearInterval(time);
    $('#outer_container').stop().animate({'bottom':'-200px'}, 1500);
    wH = $(window).height();
    wW = $(window).width();
    var wHmin = 0, wWmin = 0;

    if ($('.fp_preview').height() > $('.fp_preview').width()) {
      wHmin = 120;
      wWmin = 80;
    } else {
      wHmin = 80;
      wWmin = 120;
    }

    hideNav();

    $('.fp_preview').animate({
      'opacity'     : 0,
      'top'         : wH/2 + 'px',
      'left'        : wW/2 + 'px',
      'margin-top'  : '-'+wHmin/2+'px',
      'margin-left' : '-'+wWmin/2+'px',
      'height'      : wHmin+'px',
      'width'       : wWmin+'px',
    }, 1000, function(){
      $('.fp_preview').remove();
      $('body').removeClass('gallery');
      $('#fp_gallery, .fp_overlay').animate({'top': wH + 'px'}, 1000, function() {
        $('#fp_gallery, #thumbScroller .content img, .fp_overlay').remove();
        $('#text').animate({'top': '0px'}, 500);
      });
    });
  }

  function play() {
    $btn_start.hide();
    $btn_stop.show();
    showNextPrev('next');
  }

  function pause() {
    autoreplace = 0;
    clearInterval(time);
    $btn_stop.hide();
    $btn_start.show();
  }

  function isPause() { //check pause state
    if ($btn_start.is(':visible')) {
      return true;
    } else {
      return false;
    }
  }

  function hideThumbs(speed){
    $('#outer_container').stop().animate({'bottom':'-140px'},speed);
    showThumbsBtn();
  }

  function showThumbs(speed){
    $('#outer_container').stop().animate({'bottom':'-10px'},speed);
    hideThumbsBtn();
  }

  function hideThumbsBtn(){
    $btn_thumbs.stop().animate({'bottom':'-90px'}, 500);
  }

  function showThumbsBtn(){
    $btn_thumbs.stop().animate({'bottom':'0px'}, 500);
  }

  function hideNav(){
    $btn_next.stop().animate({'right':'-50px'}, 500);
    $btn_play.stop().animate({'right':'-50px'}, 500);
    $btn_prev.stop().animate({'left':'-50px'}, 500);
  }

  function showNav(){
    $wW = $(window).width();
    $imgW = $('.fp_preview').width();
    $btn_next.stop().animate({'right':($wW-$imgW)/2-70+'px'}, 500);
    $btn_prev.stop().animate({'left':($wW-$imgW)/2-85+'px'}, 500);
    $btn_play.stop().animate({'right':($wW-$imgW)/2-65+'px'}, 500);
  }

  function makeScrollable(){
    $(document).on('mousemove',function(e){
      //var top = (e.pageY - $(document).scrollTop()/2) ;
      $(document).scrollTop(top);
    });
  }
}
