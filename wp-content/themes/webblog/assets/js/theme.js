jQuery(function($) {
	
	'use strict';
	
	/*-----------------------------------------------------------------
	 * Carousels
	 *-----------------------------------------------------------------
	 */
 
	owlFun( "#recent-slider" );

	
	
	function owlFun( cowl ){
		
		// Home Page Slider
		var nav = $(cowl).attr('data-nav');
		var pag = $(cowl).attr('data-pag');

		$(cowl).owlCarousel({
			loop:true,
			margin:10,
			rtl:true,
			nav: parseInt(nav),
			dots: parseInt(pag),
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				}
			}
		});
	}
	
	if($('.header-menu').hasClass('sticky-activated')){
		$(window).load(function(){
      	$(".header-menu").sticky({ topSpacing: 0 });
    	});
	}
	
	
});

