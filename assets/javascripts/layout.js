$(document).ready(function(){
  $('.js--contact-form').contactForm();

  $('#slideshow img').each(function(i, val) {
    $slide = $(this);
    var tmpImg = new Image;
    tmpImg.src = $slide.attr('src');
    imgLoad(tmpImg, $slide);

  });


  function imgLoad(tmp, i) {
    $(tmp).load(function(e) {
      if (tmp.width < tmp.height) i.width('700px');
      else i.height('500px');
    });
  }


  $('#navigation-block a').on('click', function(e) {
    e.preventDefault();
    var cont2 = $.ajax({
      type: "POST",
      data: "issue_id="+$(this).attr('id')+"&lang=ru",
      cache: false,
      success: function(html){
        $(".content").replaceWith($(".content", html));
        $("#mcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
      }
    });
    return false;
  });

  $('#menu-img-content a').on('click', function(e) {
    e.preventDefault();
    $('#menu-img').removeClass('zindex');
    var wH = $(window).height();
    var wW = $(window).width();
    //alert(wH);
    var wTrambSm = 180;
    var hTrambSm = 120;
    var wTramb = 210;
    var hTramb = 140;
    var $menu;

    $('.info div').hide();
    $('.bgPhotos').hide().css({width: wTrambSm+40+'px'});

    $('.sub-menu').each(function(j, vals) {
      $menu = "#"+$(this).attr('id');
      $($menu+' .imgBlock').each(function(i, val) {
        $(this).css({top: -hTramb*i+'px', opacity: 0, width: wTrambSm+40+'px'});
      });
    });
    $('.imgBlock').css({top: -wH+'px', width: wTrambSm+40+'px'});
    $('.img, .bgPhoto').css({width: wTrambSm+'px', height: hTrambSm+'px'});


    $('#text').animate({'top': wH+20 + 'px'},500,function(){
      //$('#loading_page').show();
      $('body').addClass('gallery');
      $('<div class="fp_overlay"></div>').insertAfter($('#menu-img')).css({'top': wH+20+'px', 'height': wH+'px'});
      $('.fp_overlay').show().animate({'top': 0+'px'}, 500, function(){});

    });

    var cont3 = $.ajax({
      type: "POST",
      url: 'portfolio.php',
      data: "issue_id="+$(this).attr('id')+"&lang=ru",
      cache: false,
      success: function(html){

        $(html).insertAfter($('#menu-img'));

        galleryNavigate()
      },
      complete: function() {

      }
    });
    return false;
  });



});

