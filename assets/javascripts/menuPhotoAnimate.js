$(window).on('load', function(){
  menuPhotoAnimate();
  $('.sub-menu').css({opacity: 1});    
});

function menuPhotoAnimate(){  
  var wH = $(window).height();
  var wW = $(window).width();
  //alert(wH);
  var wTrambSm = 180;
  var hTrambSm = 120;
  var wTramb = 210;
  var hTramb = 140;
  var $menu, $menuW, $itemX, $itemW;
   
  $('#menu-img-content, .scrollWrapper').height(wH);
  $menuW = $('#menu-img-content').width();
  $itemX = (wW - $menuW)/2;
  $itemW = $menuW/5;
  
  $('.info div').hide();
  $('.bgPhotos').hide().css({width: wTrambSm+40+'px'});	

  //test
  //$('.bgPhotos').show();
  
  $('.sub-menu').each(function(j, vals) {
    $menu = "#"+$(this).attr('id');	
	  $($menu+' .imgBlock').each(function(i, val) {
	    $(this).css({top: -hTramb*i+'px', opacity: 0, width: wTrambSm+40+'px'});		  
	  });
  });
  $('.imgBlock').css({top: -wH+'px', width: wTrambSm+40+'px'});
  $('.img, .bgPhoto').css({width: wTrambSm+'px', height: hTrambSm+'px'});	
    
  $('.sub-menu').hover(
    function(){
		$('#menu-img').addClass('zindex');
	  $menu = "#"+$(this).attr('id');
	  $('.info').hide();
	  $($menu+' .bgPhoto').css({opacity: 1});
	  $($menu+' .bgPhotos').show();	
	  $($menu+' .imgBlock').stop(true).animate({top: 0+'px', opacity: 1}, 800,  function(){
	    var $this = $(this); 
		  $this.children('.img').stop(true).animate({width: wTrambSm+'px', height: hTrambSm+'px'});
	    $this.children('.bgPhoto').stop(true).animate({opacity: 1});
	  });
		
    $('div#menu-img-content').mouseGallerySlide({
      scrollElParent: $menu+' .scrollableArea',
      scrollEl: $menu+' .imgBlock' 
    });

	  $($menu+' .img').hover(
      function(){
				var $this = $(this);
	      $this.children('.bgPhoto').css({opacity: 0});
				$this.parent().children('.info.right').stop(true).show().animate({width: wTramb*2+60+'px', left: '-20px'}, 500, function(){$(this).children('div').show();});
				$this.parent().children('.info.left').stop(true).show().animate({width: wTramb*2+60+'px', left: '-240px'}, 500, function(){$(this).children('div').show();});
	      $this.stop().animate({width: wTramb+'px', height: hTramb+'px'},300,'swing');
	    },
	    function(){
				var $this = $(this);
				$this.parent().children('.info').stop(true).animate({width: '0px', left: '40px'}).hide();
				$this.parent().children('.info').children('div').hide();
				$this.stop().animate({width: wTrambSm+'px', height: hTrambSm+'px'},200,'swing',function(){
					$(this).children('.bgPhoto').css({opacity: 1});
	      })
      }
	  );
	},
	function () {
		$('#menu-img').removeClass('zindex');
	  $menu = "#"+$(this).attr('id');	   
	  $($menu+' .imgBlock').each(function(i, val) {
			$(this).animate({top: -hTramb*i+'px', opacity: 0}, 1000, function(){
				$(this).children('.bgPhoto').css({opacity: 1});
				$(this).parents(".bgPhotos").hide();
			});		  
	  }); 
	});
}