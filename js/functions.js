/**
 * Theme functions file
 *
*/


// Mobile Menu.
jQuery(document).ready(function(){
	jQuery('#mobile-open-btn').click(function () {
		jQuery('body').addClass('nav-open');
		jQuery('body').removeClass('nav-close');
    });
    jQuery('#mobile-close-btn').click(function () {
		jQuery('body').addClass('nav-close');
		jQuery('body').removeClass('nav-open');
    });
    jQuery('#desktop-open-btn').click(function () {
    	jQuery('.overlay-wrap').fadeIn('slow');
		jQuery('body').addClass('info-open');
		jQuery('body').removeClass('info-close');
    });
     jQuery('#desktop-close-btn').click(function () {
     	jQuery('.overlay-wrap').fadeOut('slow');
		jQuery('body').addClass('info-close');
		jQuery('body').removeClass('info-open');
    });
});


// Remove Classes on window width
function checkWidth(init)
{
    /*If browser resized, check width again */
    if (jQuery(window).width() > 1200) {
        jQuery('body').removeClass('nav-open');
         jQuery('body').addClass('nav-close');
    }

    if (jQuery(window).width() < 1200) {
        jQuery('body').removeClass('info-open');
        jQuery('body').addClass('info-close');
        jQuery('.overlay-wrap').fadeOut('slow');
    }

}

jQuery(document).ready(function() {
    checkWidth(true);

    jQuery(window).resize(function() {
        checkWidth(false);
    });
});


// Add CSS classes for Menu button hovers.
jQuery(document).ready(function(){
	jQuery('a#desktop-close-btn').hover(function() {
	    jQuery(this).siblings('a#desktop-open-btn').addClass('btn-hover');
	}, function() {
	    jQuery(this).siblings('a#desktop-open-btn').removeClass('btn-hover');
	    jQuery(this).siblings('a#desktop-open-btn').addClass('btn-default');
	});
});

jQuery(document).ready(function(){
	jQuery('a#mobile-close-btn').hover(function() {
	    jQuery(this).siblings('a#mobile-open-btn').addClass('btn-hover');
	}, function() {
	    jQuery(this).siblings('a#mobile-open-btn').removeClass('btn-hover');
	    jQuery(this).siblings('a#mobile-open-btn').addClass('btn-default');
	});
});


// Sticky Headers on Single Posts.
jQuery(document).ready(function(){

	jQuery('article').waypoint(function() {
		jQuery(this).find('> .entry-header-single').toggleClass('stickit');
	});

	 jQuery('article').waypoint(function(direction){
      // sticky header
      jQuery(this).find('> .entry-header-single').toggleClass('stickit-end');
    }, {
      offset: function() { return -jQuery(this).outerHeight() + jQuery(this).find('> .entry-header-single').outerHeight(); }
    });

});


// Scalable Videos (more info see: fitvidsjs.com).
jQuery(document).ready(function(){
	jQuery('#primary').fitVids();
});

jQuery(document).ready(function(){
	jQuery( document.body ).on( 'post-load', function () {
        // New posts have been added to the page.
        jQuery('#primary').fitVids();
    });
});