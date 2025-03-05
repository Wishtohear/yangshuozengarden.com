( function( $ ){
    $( document ).ready( function(){
						
      $( '.hotel-and-travel-btn-get-started' ).on( 'click', function( e ) {
          e.preventDefault();
          $( this ).html( 'Processing... Please wait' ).addClass( 'updating-message' );
          $.post( hotel_and_travel_ajax_object.ajax_url, { 'action' : 'install_act_plugin' }, function( response ){
              location.href = 'themes.php?page=advanced-import';
          } );
      } );
    } );

}( jQuery ) )