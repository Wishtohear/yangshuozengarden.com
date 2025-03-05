<?php
/**
 * Hotel and Travel Customizer Note Control.
 * 
 * @package Best_Shop
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'hotel_and_travel_Notice_Control' ) ){

	class hotel_and_travel_Notice_Control extends WP_Customize_Control {
		
		public function render_content(){ ?>
            <div class="customizer_note_control">
            <a href="https://www.gradientthemes.com/product/wordpress-shopping-cart-theme/"  target="_blank" >
    	    <span class="customize-control-title"> 
    			<?php echo wp_kses_post( $this->label ); ?>
    		</span>
    
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post( $this->description ); ?>
                </span></a>
            </div>
    		<?php }
        }
	}
}