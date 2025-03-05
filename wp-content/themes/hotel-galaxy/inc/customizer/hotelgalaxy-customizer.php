<?php
/**
 * Hotel Galaxy Theme Customizer.
 *
 * @package Hotel Galaxy
 */

if ( ! class_exists( 'Hotelgalaxy_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0
	 */
	class Hotelgalaxy_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'hotelgalaxy_customize_preview_js' ) );
			add_action( 'customize_register',                      array( $this, 'hotelgalaxy_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'hotelgalaxy_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function hotelgalaxy_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';		


			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.main-title a',
				'render_callback' => 'hotelgalaxy_customize_partial_blogname',
			) );

			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => 'hotelgalaxy_customize_partial_blogdescription',
			) );		

			$wp_customize->selective_refresh->add_partial( 'nav_menu_locations[primary]', array(
				'selector' => 'ul.navbar-nav',
				'render_callback' => function(){ return 'nav_menu_locations[primary]'; },
			) );			
			
			/**
			 * Helper files
			 */			
			require HOTEL_PARENT_INC_DIR . '/customizer/controls/font-control.php';
			require HOTEL_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function hotelgalaxy_customize_preview_js() {		

			wp_enqueue_script( 'hotelgalaxy-customizer',HOTEL_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '456345', true );
		}

		// Include customizer customizer settings.

		function hotelgalaxy_customizer_settings() {	

			require HOTEL_PARENT_INC_DIR.'/customizer/customizer-sections/customizer-header.php';
			require HOTEL_PARENT_INC_DIR.'/customizer/customizer-sections/customizer-footer.php';
			require HOTEL_PARENT_INC_DIR.'/customizer/customizer-sections/customizer-general.php';
			require HOTEL_PARENT_INC_DIR.'/customizer/customizer-sections/customizer-blog.php';
			require HOTEL_PARENT_INC_DIR . '/customizer/customizer-sections/hotelgalaxy-recommended-plugin.php';
			require HOTEL_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Hotelgalaxy_Customizer::get_instance();