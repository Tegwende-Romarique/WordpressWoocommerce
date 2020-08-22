jQuery(document).ready(function() {
		
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('.nav li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 768) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
	
	/*scroll-top*/
	 var amountScrolled = 300;

jQuery(window).scroll(function() {
	if ( jQuery(window).scrollTop() > amountScrolled ) {
		jQuery('a.back-to-top').fadeIn('slow');
	} else {
		jQuery('a.back-to-top').fadeOut('slow');
	}
});

jQuery('a.back-to-top').click(function() {
	jQuery('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
});
	
jQuery(document).ready(function() {
	jQuery('.blog-right-side').masonry({
	  itemSelector: '.blog-content'
	});
 });