

//extend the plugin
(function($){

$.fn.contactable = function(options) {

	//call in the default otions
	var options = $.extend(defaults, options);
	
	//act upon the element that is passed into the design    
	return this.each(function() {
		//construct the form
		var this_id_prefix = '#'+this.id+' ';
		//show / hide function
		$(this_id_prefix+'div#contactable_inner').toggle(function() {
			var $this = $(this);
			
			$(this_id_prefix+'#overlay').css({display: 'block'});
			$this.animate({"marginRight": "-=45px"}, "fast"); 
			$(this_id_prefix+'#contactForm').animate({"marginRight": "-=0px"}, "fast");
			$this.animate({"marginRight": "+=145px"}, "slow"); 
			$(this_id_prefix+'#contactForm').animate({"marginRight": "+=553px"}, "slow"); 
		}, function() {
			$(this_id_prefix+'#contactForm').animate({"marginRight": "-=553px"}, "slow");
			$(this).animate({"marginRight": "-=145px"}, "slow").animate({"marginRight": "+=45px"}, "fast"); 
			$(this_id_prefix+'#overlay').css({display: 'none'});
		});			
	});
	
	
};
 
})(jQuery);
