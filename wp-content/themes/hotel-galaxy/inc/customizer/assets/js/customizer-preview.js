( function( $ ) {

	// site title in real time...
    wp.customize( 'blogname', function( value ) {
        value.bind( function( newval ) {
            $( 'h1.site-title a' ).text( newval );
        } );
    } );

    //site description in real time...
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( newval ) {
            $( 'p.site-description' ).text( newval );
        } );
    } );

    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( color ) { 
            $( 'h1.site-title a, p.site-description' ).css( {
                'color': color
            } );            
        } );
    } );

    //background color...
    wp.customize( 'background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );

	 // logo width
    wp.customize( 'logo_width', function( value ) {
        value.bind( function( size ) {             
            $('.logo img').css('width', size + 'px' );
        } );
    } ); 

    // breadcrumb width
    wp.customize( 'breadcrumb_height', function( value ) {
        value.bind( function( size ) {
            $('.breadcrumb-section').css('height', size + 'px' );
            $('.breadcrumb-section .overlay').css('min-height', size + 'px' );
        } );
    } ); 


    /**
     * Body font size
     */
    wp.customize( 'hotelgalaxy_body_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'body' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    
    /**
     * Body font style
     */
    wp.customize( 'hotelgalaxy_body_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'body' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * Body text tranform
     */
    wp.customize( 'hotelgalaxy_body_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'body' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * hotelgalaxy_body_line_height
     */
    
    wp.customize( 'hotelgalaxy_body_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'body' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H1 font family
     */
    wp.customize( 'hotelgalaxy_h1_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h1' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H1 font size
     */
    wp.customize( 'hotelgalaxy_h1_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h1' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    
    /**
     * H1 font style
     */
    wp.customize( 'hotelgalaxy_h1_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h1' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H1 text tranform
     */
    wp.customize( 'hotelgalaxy_h1_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h1' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H1 line height
     */
    wp.customize( 'hotelgalaxy_h1_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h1' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H2 font family
     */
    wp.customize( 'hotelgalaxy_h2_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h2' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H2 font size
     */
    wp.customize( 'hotelgalaxy_h2_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h2' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    /**
     * H2 font style
     */
    wp.customize( 'hotelgalaxy_h2_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h2' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H2 text tranform
     */
    wp.customize( 'hotelgalaxy_h2_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h2' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H2 line height
     */
    wp.customize( 'hotelgalaxy_h2_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h2' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H3 font family
     */
    wp.customize( 'hotelgalaxy_h3_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h3' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H3 font size
     */
    wp.customize( 'hotelgalaxy_h3_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h3' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    /**
     * H3 font style
     */
    wp.customize( 'hotelgalaxy_h3_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h3' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H3 text tranform
     */
    wp.customize( 'hotelgalaxy_h3_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h3' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H3 line height
     */
    wp.customize( 'hotelgalaxy_h3_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h3' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H4 font family
     */
    wp.customize( 'hotelgalaxy_h4_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h4' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H4 font size
     */
    wp.customize( 'hotelgalaxy_h4_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h4' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    /**
     * H4 font style
     */
    wp.customize( 'hotelgalaxy_h4_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h4' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H4 text tranform
     */
    wp.customize( 'hotelgalaxy_h4_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h4' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H4 line height
     */
        wp.customize( 'hotelgalaxy_h4_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h4' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H5 font family
     */
    wp.customize( 'hotelgalaxy_h5_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h5' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H5 font size
     */
    wp.customize( 'hotelgalaxy_h5_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h5' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    /**
     * H5 font style
     */
    wp.customize( 'hotelgalaxy_h5_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h5' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H5 text tranform
     */
    wp.customize( 'hotelgalaxy_h5_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h5' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H5 line height
     */
        wp.customize( 'hotelgalaxy_h5_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h5' ).css( 'line-height', line_height );
        } );
    } );
    
    /**
     * H6 font family
     */
    wp.customize( 'hotelgalaxy_h6_font_family', function( value ) {
        value.bind( function( font_family ) {
            jQuery( 'h6' ).css( 'font-family', font_family );
        } );
    } );
    
    /**
     * H6 font size
     */
    wp.customize( 'hotelgalaxy_h6_font_size', function( value ) {
        value.bind( function( size ) {
            jQuery( 'h6' ).css( 'font-size', size + 'px' );
        } );
    } );
    
    /**
     * H6 font style
     */
    wp.customize( 'hotelgalaxy_h6_font_style', function( value ) {
        value.bind( function( font_style ) {
            jQuery( 'h6' ).css( 'font-style', font_style );
        } );
    } );
    
    /**
     * H6 text tranform
     */
    wp.customize( 'hotelgalaxy_h6_text_transform', function( value ) {
        value.bind( function( text_tranform ) {
            jQuery( 'h6' ).css( 'text-transform', text_tranform );
        } );
    } );
    
    /**
     * H6 line height
     */
    wp.customize( 'hotelgalaxy_h6_line_height', function( value ) {
        value.bind( function( line_height ) {
            jQuery( 'h6' ).css( 'line-height', line_height );
        } );
    } );

} )( jQuery );