/*
	This function makes sure an element exists
	before trying to run code on it, effectively
	prevents any errors that can break other code
	and increases performance.

    - Kenny
*/
var is_element = function(elem, callBack) {
    return (jQuery(elem).length > 0) ? callBack() : false;
}

jQuery(function($) {
	$(document).ready(function(){
		// Brandefined Logo Animation
		is_element('.brandefined-logo-container', function(){
			var $logo = $('.brandefined-logo-container');
			$logo.on('mouseover', function() {
				$('.brandefined-logo span').addClass('show');
			});
			$logo.on('mouseout', function() {
				$('.brandefined-logo span').removeClass('show');
			});
		});

		function setup_collapsible_submenus() {
	        var $menu = $('#mobile_menu'),
	            top_level_link = '#mobile_menu .menu-item-has-children > a';
	             
	        $menu.find('a').each(function() {
	            $(this).off('click');
	              
	            if ( $(this).is(top_level_link) ) {
	                $(this).attr('href', '#');
	            }
	              
	            if ( ! $(this).siblings('.sub-menu').length ) {
	                $(this).on('click', function(event) {
	                    $(this).parents('.mobile_nav').trigger('click');
	                });
	            } else {
	                $(this).on('click', function(event) {
	                    event.preventDefault();
	                    $(this).parent().toggleClass('visible');
	                });
	            }
	        });
	    }
	
		$(window).load(function() {
	        setTimeout(function() {
	            setup_collapsible_submenus();
	        }, 700);
	    });
	});
});