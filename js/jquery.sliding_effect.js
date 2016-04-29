$(document).ready(function() {
	slide();
	positionMenu();
});

$(window).resize(function() {
	positionMenu();	
});

function positionMenu() {
	var $navBlock = $('#navigation-block');
			
	var menuLeftW = $navBlock.height()-50,
			wH = $(window).height(),
			wW = $(window).width();
			
	$navBlock.css({top: (wH-menuLeftW)/2+'px'});
	$('#menu-img-content, .scrollWrapper').height(wH);
	
	if (wH < 530) {
		$navBlock.css({top: '15px'});
	}
}

function slide() {
	var list_elements = "#sliding-navigation li.sliding-element div";
	$(list_elements).append("<span></span>");
	
	$(list_elements).each(function(i) {
		var $this = $(this);
		
		var linkText = $("a", $this).html();
		$("span", $this).html(linkText); //Add the text in the <span> tag
		$this.hover(function() {
				$("a", $this).stop().animate({marginLeft : "0px"}, 250);
			}, function() {
				$("a", $this).stop().animate({marginLeft : "-150px"}, 250);
			}
		);
	});
}