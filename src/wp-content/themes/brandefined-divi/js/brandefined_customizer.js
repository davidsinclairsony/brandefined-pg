(function($) {
  wp.customize( 'brandefined_custom_css', function( value ) {
    value.bind( function(to) {
      $('#brandefined-custom-css').html( to );
    });
  });
})(jQuery);