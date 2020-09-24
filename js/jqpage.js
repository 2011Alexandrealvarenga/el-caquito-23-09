var height = jQuery('#header').height();

jQuery(window).scroll (function(){



	if(jQuery(this).scrollTop()>height){

		jQuery('nav').addClass('fixed');

	}else{

		jQuery('nav').removeClass('fixed');

	}

});

