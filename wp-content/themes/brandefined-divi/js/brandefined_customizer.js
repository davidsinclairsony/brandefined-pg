(function($) {
  wp.customize( 'brandefined_custom_css', function( value ) {
    value.bind( function(to) {
      $('#brandefined-custom-css').html( to );
    });
  });
  
	wp.customize( 'bd_social_icon_header_size', function( value ) {
		value.bind( function( to ) {
			$( '#top-header .bd-social-icons li > a' ).css('font-size', to + "px");
			$('.bd-custom-range').closest('.bd-custom-range-value').val(to);
		} );
	} );
	wp.customize( 'bd_social_icon_footer_size', function( value ) {
		value.bind( function( to ) {
			$( '#footer-bottom .et-social-icon > a' ).css('font-size', to + "px");
			$('.bd-custom-range').closest('.bd-custom-range-value').val(to);
		} );
	} );

})(jQuery);

