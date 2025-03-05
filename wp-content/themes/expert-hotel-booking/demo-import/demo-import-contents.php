<?php

/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $expert_hotel_booking_theme_name = '';
	protected $expert_hotel_booking_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $expert_hotel_booking_page_slug = '';
	protected $expert_hotel_booking_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	public $parent_slug;
	
	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}
	
	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {

		if( isset( $config['expert_hotel_booking_page_slug'] ) ) {
			$this->expert_hotel_booking_page_slug = esc_attr( $config['expert_hotel_booking_page_slug'] );
		}
		if( isset( $config['expert_hotel_booking_page_title'] ) ) {
			$this->expert_hotel_booking_page_title = esc_attr( $config['expert_hotel_booking_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$expert_hotel_booking_current_theme = wp_get_theme();
		$this->expert_hotel_booking_theme_title = $expert_hotel_booking_current_theme->get( 'Name' );
		$this->expert_hotel_booking_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $expert_hotel_booking_current_theme->get( 'Name' ) ) );
		$this->expert_hotel_booking_page_slug = apply_filters( $this->expert_hotel_booking_theme_name . '_theme_setup_wizard_expert_hotel_booking_page_slug', $this->expert_hotel_booking_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->expert_hotel_booking_theme_name . '_theme_setup_wizard_parent_slug', '' );

	}
	
	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */	
	public function init() {
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
		
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'expert-hotel-booking-demo-import-style', get_template_directory_uri() . '/demo-import/assets/css/demo-import-style.css');
		wp_register_script( 'expert-hotel-booking-demo-import-script', get_template_directory_uri() . '/demo-import/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'expert-hotel-booking-demo-import-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'expert-hotel-booking' )
			)
		);
		wp_enqueue_script( 'expert-hotel-booking-demo-import-script' );
	}
	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->expert_hotel_booking_page_title ), esc_html( $this->expert_hotel_booking_page_title ), 'manage_options', $this->expert_hotel_booking_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$expert_hotel_booking_theme = wp_get_theme();
		$expert_hotel_booking_theme_title = $expert_hotel_booking_theme->get( 'Name' );
		$expert_hotel_booking_theme_version = $expert_hotel_booking_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php 
			// Theme Title and Version
			printf( '<h1>%s %s</h1>', esc_html( $expert_hotel_booking_theme_title ), esc_html( '(Version :- ' . $expert_hotel_booking_theme_version . ')' ) );
			?>
			
			<div class="card whizzie-wrap">
				<div class="demo_content_image">
					<div class="demo_content">
						<?php

						$expert_hotel_booking_steps = $this->get_steps();
						echo '<ul class="whizzie-menu">';
						foreach ( $expert_hotel_booking_steps as $expert_hotel_booking_step ) {
							$class = 'step step-' . esc_attr( $expert_hotel_booking_step['id'] );
							echo '<li data-step="' . esc_attr( $expert_hotel_booking_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
							printf( '<h2>%s</h2>', esc_html( $expert_hotel_booking_step['title'] ) );

							$content = call_user_func( array( $this, $expert_hotel_booking_step['view'] ) );
							if ( isset( $content['summary'] ) ) {
								printf(
									'<div class="summary">%s</div>',
									wp_kses_post( $content['summary'] )
								);
							}
							if ( isset( $content['detail'] ) ) {
								printf( '<p><a href="#" class="more-info">%s</a></p>', esc_html__( 'More Info', 'expert-hotel-booking' ) );
								printf(
									'<div class="detail">%s</div>',
									wp_kses_post( $content['detail'] )
								);
							}
							if ( isset( $expert_hotel_booking_step['button_text'] ) && $expert_hotel_booking_step['button_text'] ) {
								printf( 
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $expert_hotel_booking_step['callback'] ),
									esc_attr( $expert_hotel_booking_step['id'] ),
									esc_html( $expert_hotel_booking_step['button_text'] )
								);
							}
							if ( isset( $expert_hotel_booking_step['can_skip'] ) && $expert_hotel_booking_step['can_skip'] ) {
								printf( 
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( 'do_next_step' ),
									esc_attr( $expert_hotel_booking_step['id'] ),
									esc_html__( 'Skip', 'expert-hotel-booking' )
								);
							}
							echo '</li>';
						}
						echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							foreach ( $expert_hotel_booking_steps as $expert_hotel_booking_step ) {
								if ( isset( $expert_hotel_booking_step['icon'] ) && $expert_hotel_booking_step['icon'] ) {
									echo '<li class="nav-step-' . esc_attr( $expert_hotel_booking_step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $expert_hotel_booking_step['icon'] ) . '"></span></li>';
								}
							}
							?>
						</ul>

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->

					<div class="demo_image">
						<div class="demo_image buttons">
							<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_PRO_THEME_URL ); ?>" class="button button-primary bundle" target="_blank"><?php echo esc_html__( 'Buy Now', 'expert-hotel-booking' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_THEME_BUNDLE_URL ); ?>" class="button button-primary bundle pro" target="_blank"><?php echo esc_html__( 'Buy All Themes', 'expert-hotel-booking' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DOCS_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'expert-hotel-booking' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_SUPPORT_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support', 'expert-hotel-booking' ); ?></a>
						</div>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $expert_hotel_booking_theme_title ); ?>" />
					</div> <!-- .demo_image -->

				</div> <!-- .demo_content_image -->
			</div> <!-- .whizzie-wrap -->
		</div> <!-- .wrap -->
		<?php
	}


		
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$expert_hotel_booking_dev_steps = $this->config_steps;
		$expert_hotel_booking_steps = array( 
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'expert-hotel-booking' ) . $this->expert_hotel_booking_theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro',
				'callback'		=> 'do_next_step',
				'button_text'	=> __( 'Start Now', 'expert-hotel-booking' ),
				'can_skip'		=> false
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'expert-hotel-booking' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo Content', 'expert-hotel-booking' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'expert-hotel-booking' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $expert_hotel_booking_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from demo-import-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $expert_hotel_booking_dev_steps as $expert_hotel_booking_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $expert_hotel_booking_dev_step['id'] ) ) {
					$id = $expert_hotel_booking_dev_step['id'];
					if( isset( $expert_hotel_booking_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $expert_hotel_booking_dev_step[$element] ) ) {
								$expert_hotel_booking_steps[$id][$element] = $expert_hotel_booking_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $expert_hotel_booking_steps;
	}
	
	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<div class="steps_content">
				<p>
					<?php printf(
						/* translators: %s: Theme name. */
						esc_html__('Thank you for choosing the %s theme. You will only need a few minutes to configure and launch your new website with the help of this quick setup tutorial. To begin using your website, simply follow the wizard\'s instructions.', 'expert-hotel-booking'),
						esc_html($this->expert_hotel_booking_theme_title)
					); ?>
				</p>
			</div>
		</div>
	<?php }

	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
	<div class="summary">
		<p>
			<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them.','expert-hotel-booking'); ?>
		</p>
	</div>
	<?php }
	
	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="expert-hotel-booking-demo-setup-guid">
			<div class="customize_div"><?php echo esc_html( 'Now Customize your website' ); ?>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize_link">
					<?php echo esc_html( 'Customize ' ); ?> 
					<span class="dashicons dashicons-share-alt2"></span>
				</a>
			</div>
			<div class="expert-hotel-booking-setup-finish">
				<a target="_blank" href="<?php echo esc_url( admin_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Go To Dashboard', 'expert-hotel-booking' ); ?>
				</a>
				<a target="_blank" href="<?php echo esc_url( get_home_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Preview Site', 'expert-hotel-booking' ); ?>
				</a>
			</div>
		</div>
	<?php }

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}

	public function expert_hotel_booking_customizer_right_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_hotel_booking_themename = 'Expert Hotel Booking';
		$expert_hotel_booking_menuname = $expert_hotel_booking_themename . ' Primary Right';
		$expert_hotel_booking_menu_right_location = 'primary-left';
		$expert_hotel_booking_menu_exists = wp_get_nav_menu_object($expert_hotel_booking_menuname);

		if (!$expert_hotel_booking_menu_exists) {
			$expert_hotel_booking_menu_id = wp_create_nav_menu($expert_hotel_booking_menuname);

			// Home
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' => __('Home', 'expert-hotel-booking'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$expert_hotel_booking_page_about = get_page_by_path('about');
			if($expert_hotel_booking_page_about){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('About', 'expert-hotel-booking'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$expert_hotel_booking_page_services = get_page_by_path('services');
			if($expert_hotel_booking_page_services){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Services', 'expert-hotel-booking'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$expert_hotel_booking_page_blog = get_page_by_path('blog');
			if($expert_hotel_booking_page_blog){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'expert-hotel-booking'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_hotel_booking_menu_right_location)) {
				$expert_hotel_booking_locations = get_theme_mod('nav_menu_locations');
				$expert_hotel_booking_locations[$expert_hotel_booking_menu_right_location] = $expert_hotel_booking_menu_id;
				set_theme_mod('nav_menu_locations', $expert_hotel_booking_locations);
			}
		}
	}

	public function expert_hotel_booking_customizer_left_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_hotel_booking_themename = 'Expert Hotel Booking';
		$expert_hotel_booking_menuname = $expert_hotel_booking_themename . ' Primary Menu';
		$expert_hotel_booking_menulocation = 'primary-right';
		$expert_hotel_booking_menu_exists = wp_get_nav_menu_object($expert_hotel_booking_menuname);

		if (!$expert_hotel_booking_menu_exists) {
			$expert_hotel_booking_menu_id = wp_create_nav_menu($expert_hotel_booking_menuname);

			// Hotels
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' =>  __('Hotels','expert-hotel-booking'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Rooms
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' =>  __('Rooms','expert-hotel-booking'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// 404 Page
			$expert_hotel_booking_notfound = get_page_by_path('404 Page');
			if($expert_hotel_booking_notfound){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'expert-hotel-booking'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($expert_hotel_booking_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Contact Us
			$expert_hotel_booking_page_contact = get_page_by_path('contact');
			if($expert_hotel_booking_page_contact){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'expert-hotel-booking'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_hotel_booking_menulocation)) {
				$expert_hotel_booking_locations = get_theme_mod('nav_menu_locations');
				$expert_hotel_booking_locations[$expert_hotel_booking_menulocation] = $expert_hotel_booking_menu_id;
				set_theme_mod('nav_menu_locations', $expert_hotel_booking_locations);
			}
		}
	}

	public function expert_hotel_booking_customizer_nav_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_hotel_booking_themename = 'Expert Hotel Booking';
		$expert_hotel_booking_menuname = $expert_hotel_booking_themename . ' Respnsive Menu';
		$expert_hotel_booking_menulocation_respnsive = 'responsive-menu';
		$expert_hotel_booking_menu_exists = wp_get_nav_menu_object($expert_hotel_booking_menuname);

		if (!$expert_hotel_booking_menu_exists) {
			$expert_hotel_booking_menu_id = wp_create_nav_menu($expert_hotel_booking_menuname);

			// Home
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' => __('Home', 'expert-hotel-booking'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$expert_hotel_booking_page_about = get_page_by_path('about');
			if($expert_hotel_booking_page_about){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('About', 'expert-hotel-booking'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$expert_hotel_booking_page_services = get_page_by_path('services');
			if($expert_hotel_booking_page_services){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Services', 'expert-hotel-booking'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$expert_hotel_booking_page_blog = get_page_by_path('blog');
			if($expert_hotel_booking_page_blog){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'expert-hotel-booking'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// 404 Page
			$expert_hotel_booking_notfound = get_page_by_path('404 Page');
			if($expert_hotel_booking_notfound){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'expert-hotel-booking'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($expert_hotel_booking_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Team
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' =>  __('Team','expert-hotel-booking'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Classes
			wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
				'menu-item-title' =>  __('Classes','expert-hotel-booking'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Contact Us
			$expert_hotel_booking_page_contact = get_page_by_path('contact');
			if($expert_hotel_booking_page_contact){
				wp_update_nav_menu_item($expert_hotel_booking_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'expert-hotel-booking'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($expert_hotel_booking_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_hotel_booking_menulocation_respnsive)) {
				$expert_hotel_booking_locations = get_theme_mod('nav_menu_locations');
				$expert_hotel_booking_locations[$expert_hotel_booking_menulocation_respnsive] = $expert_hotel_booking_menu_id;
				set_theme_mod('nav_menu_locations', $expert_hotel_booking_locations);
			}
		}
	}


	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

		//................................................. MENUS .................................................//
		
			// Creation of home page //
			$expert_hotel_booking_home_content = '';
			$expert_hotel_booking_home_title = 'Home';
			$expert_hotel_booking_home = array(
					'post_type' => 'page',
					'post_title' => $expert_hotel_booking_home_title,
					'post_content'  => $expert_hotel_booking_home_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_slug' => 'home'
			);
			$expert_hotel_booking_home_id = wp_insert_post($expert_hotel_booking_home);

			add_post_meta( $expert_hotel_booking_home_id, '_wp_page_template', 'templates/template-frontpage.php' );

			$expert_hotel_booking_home = get_page_by_title( 'Home' );
			update_option( 'page_on_front', $expert_hotel_booking_home->ID );
			update_option( 'show_on_front', 'page' );

			// Creation of blog page //
			$expert_hotel_booking_blog_title = 'Blog';
			$expert_hotel_booking_blog_check = get_page_by_path('blog');
			if (!$expert_hotel_booking_blog_check) {
				$expert_hotel_booking_blog = array(
					'post_type'    => 'page',
					'post_title'   => $expert_hotel_booking_blog_title,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'blog'
				);
				$expert_hotel_booking_blog_id = wp_insert_post($expert_hotel_booking_blog);

				if (!is_wp_error($expert_hotel_booking_blog_id)) {
					update_option('page_for_posts', $expert_hotel_booking_blog_id);
				}
			}

			// Creation of contact us page //
			$expert_hotel_booking_contact_title = 'Contact Us';
			$expert_hotel_booking_contact_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_hotel_booking_contact_check = get_page_by_path('contact');
			if (!$expert_hotel_booking_contact_check) {
				$expert_hotel_booking_contact = array(
					'post_type'    => 'page',
					'post_title'   => $expert_hotel_booking_contact_title,
					'post_content'   => $expert_hotel_booking_contact_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'contact' // Unique slug for the Contact Us page
				);
				wp_insert_post($expert_hotel_booking_contact);
			}

			// Creation of about page //
			$expert_hotel_booking_about_title = 'About';
			$expert_hotel_booking_about_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_hotel_booking_about_check = get_page_by_path('about');
			if (!$expert_hotel_booking_about_check) {
				$expert_hotel_booking_about = array(
					'post_type'    => 'page',
					'post_title'   => $expert_hotel_booking_about_title,
					'post_content'   => $expert_hotel_booking_about_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'about' // Unique slug for the About page
				);
				wp_insert_post($expert_hotel_booking_about);
			}

			// Creation of services page //
			$expert_hotel_booking_services_title = 'Services';
			$expert_hotel_booking_services_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_hotel_booking_services_check = get_page_by_path('services');
			if (!$expert_hotel_booking_services_check) {
				$expert_hotel_booking_services = array(
					'post_type'    => 'page',
					'post_title'   => $expert_hotel_booking_services_title,
					'post_content'   => $expert_hotel_booking_services_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'services' // Unique slug for the Services page
				);
				wp_insert_post($expert_hotel_booking_services);
			}

			// Creation of 404 page //
			$expert_hotel_booking_notfound_title = '404 Page';
			$expert_hotel_booking_notfound = array(
				'post_type'   => 'page',
				'post_title'  => $expert_hotel_booking_notfound_title,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug'   => '404'
			);
			$expert_hotel_booking_notfound_id = wp_insert_post($expert_hotel_booking_notfound);
			add_post_meta($expert_hotel_booking_notfound_id, '_wp_page_template', '404.php');


			$expert_hotel_booking_slider_title = 'ENJOY VACATIONS WITH LUXURY HOTEL 01';
			$expert_hotel_booking_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
			$expert_hotel_booking_slider_check = get_page_by_path('slider-page');

			// Check if the page already exists, if not, create the page
			if (!$expert_hotel_booking_slider_check) {
				// Insert the page
				$expert_hotel_booking_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_hotel_booking_slider_title,
					'post_content'  => $expert_hotel_booking_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-page'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_hotel_booking_slider);
				
				// Get the image URL (replace 'slider.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_hotel_booking_slider_title = 'ENJOY VACATIONS WITH LUXURY HOTEL 02';
			$expert_hotel_booking_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
			$expert_hotel_booking_slider_check = get_page_by_path('slider-pages');

			// Check if the page already exists, if not, create the page
			if (!$expert_hotel_booking_slider_check) {
				// Insert the page
				$expert_hotel_booking_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_hotel_booking_slider_title,
					'post_content'  => $expert_hotel_booking_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pages'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_hotel_booking_slider);
				
				// Get the image URL (replace 'slider2.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider2.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider2.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_hotel_booking_slider_title = 'ENJOY VACATIONS WITH LUXURY HOTEL 03';
			$expert_hotel_booking_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
			$expert_hotel_booking_slider_check = get_page_by_path('slider-pagess');

			// Check if the page already exists, if not, create the page
			if (!$expert_hotel_booking_slider_check) {
				// Insert the page
				$expert_hotel_booking_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_hotel_booking_slider_title,
					'post_content'  => $expert_hotel_booking_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pagess'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_hotel_booking_slider);
				
				// Get the image URL (replace 'slider3.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider3.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider3.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			
		/* -------------- Blogs ------------------*/

			wp_delete_post(1);

			$post_title = array('Classic Single Room','Deluxe Suite Room','Modern Single Room','Classic Double Room','Double Bed Room','Top Rated Room');

			for($i=1;$i<=6;$i++){

				$content = 'Lorem Ipsum is simply dummy text of the Lorem Ipsum has been scrambled it to make a type specimen book.';

				$my_post = array(
					'post_title'    => $post_title[$i-1],
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'post',
					'post_category' => array($column_left)
				);

				$tcpost_id = wp_insert_post( $my_post );

				set_theme_mod( 'expert_hotel_booking_section_settigs'.$i, $tcpost_id );

				$image_url = get_template_directory_uri().'/assets/images/services'.$i.'.png';

				$image_name= 'services'.$i.'.png';
				$upload_dir       = wp_upload_dir();
				// Set upload folder
				$image_data       = file_get_contents($image_url);
				// Get image data
				$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
				// Generate unique name
				$filename= basename( $unique_file_name );
				// Create image file name
				// Check folder permission and define file location
				if( wp_mkdir_p( $upload_dir['path'] ) ) {
					$file = $upload_dir['path'] . '/' . $filename;
				} else {
					$file = $upload_dir['basedir'] . '/' . $filename;
				}
				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}

				WP_Filesystem();
				global $wp_filesystem;

				if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}
				// Check image file type
				$wp_filetype = wp_check_filetype( $filename, null );
				// Set attachment data
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name( $filename ),
					'post_content'   => '',
					'post_type'     => 'post',
					'post_status'    => 'inherit'
				);

				// Create the attachment
				$attach_id = wp_insert_attachment( $attachment, $file, $tcpost_id );
				// Include image.php
				require_once(ABSPATH . 'wp-admin/includes/image.php');
				// Define attachment metadata
				$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
				// Assign metadata to attachment
					wp_update_attachment_metadata( $attach_id, $attach_data );
				// And finally assign featured image to post
				set_post_thumbnail( $tcpost_id, $attach_id );
			}

					
		/* -------------- Header ------------------*/
			
			set_theme_mod('expert_hotel_booking_topheader_email', 'Hotelbooking@gmail.com');
			set_theme_mod('expert_hotel_booking_topheader_phoneno', '+91 123-456-780');
			set_theme_mod('expert_hotel_booking_topheader_offer_text', 'Get Latest offers on hotel packages upto 25% off');
			

		/* -------------- Slider ------------------*/
	
			set_theme_mod('expert_hotel_booking_slider_short_heading', 'Find What Make You Happy');
			set_theme_mod('expert_hotel_booking_tourist_setting', 1);

			$expert_hotel_booking_sliders = array('slider-page', 'slider-pages', 'slider-pagess');

			for ($i = 0; $i < count($expert_hotel_booking_sliders); $i++) {
				$page = get_page_by_path($expert_hotel_booking_sliders[$i]);

				if ($page) {
					set_theme_mod('expert_hotel_booking_slider' . ($i + 1), $page->ID);
				} else {
					set_theme_mod('expert_hotel_booking_slider' . ($i + 1), 0);
				}
			}
			
			
		/* -------------- Services ------------------*/

			set_theme_mod('expert_hotel_booking_section_title', 'TAKE A LOOK OUR LUXURY HOTEL & ROOMS');
			set_theme_mod('expert_hotel_booking_section_text', 'Lorem Ipsum is simply dummy text of the Lorem Ipsum has been the industry');
        
			$this->expert_hotel_booking_customizer_left_menu();
			$this->expert_hotel_booking_customizer_right_menu();
			$this->expert_hotel_booking_customizer_nav_menu();

	    exit;
	}
}