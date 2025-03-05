<?php
/**
 * Theme Page
 *
 * @package Expert Hotel Booking
 */

if ( ! defined( 'EXPERT_HOTEL_BOOKING_FREE_THEME_URL' ) ) {
	define( 'EXPERT_HOTEL_BOOKING_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/free-hotel-wordpress-theme' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_PRO_THEME_URL' ) ) {
	define( 'EXPERT_HOTEL_BOOKING_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/hotel-booking-wordpress-theme' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_DEMO_THEME_URL' ) ) {
	define( 'EXPERT_HOTEL_BOOKING_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/hotel-booking-expert/' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_DOCS_THEME_URL' ) ) {
    define( 'EXPERT_HOTEL_BOOKING_DOCS_THEME_URL', 'https://demo.seothemesexpert.com/documentation/expert-hotel-booking/' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_RATE_THEME_URL' ) ) {
    define( 'EXPERT_HOTEL_BOOKING_RATE_THEME_URL', 'https://wordpress.org/support/theme/expert-hotel-booking/reviews/#new-post' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_SUPPORT_THEME_URL' ) ) {
    define( 'EXPERT_HOTEL_BOOKING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/expert-hotel-booking/' );
}
if ( ! defined( 'EXPERT_HOTEL_BOOKING_THEME_BUNDLE_URL' ) ) {
    define( 'EXPERT_HOTEL_BOOKING_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}


/**
 * Add theme page
 */
function expert_hotel_booking_menu() {
	add_theme_page( esc_html__( 'About Theme', 'expert-hotel-booking' ), esc_html__( 'About Theme', 'expert-hotel-booking' ), 'edit_theme_options', 'expert-hotel-booking-about', 'expert_hotel_booking_about_display' );
}
add_action( 'admin_menu', 'expert_hotel_booking_menu' );

/**
 * Display About page
 */
function expert_hotel_booking_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'expert-hotel-booking' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-hotel-booking-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'expert-hotel-booking-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'expert-hotel-booking' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-hotel-booking-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'expert-hotel-booking' ); ?></a>
		</nav>

		<?php
			expert_hotel_booking_main_screen();

			expert_hotel_booking_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'expert-hotel-booking' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'expert-hotel-booking' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'expert-hotel-booking' ) : esc_html_e( 'Go to Dashboard', 'expert-hotel-booking' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function expert_hotel_booking_main_screen() {
	if ( isset( $_GET['page'] ) && 'expert-hotel-booking-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'expert-hotel-booking' ) ?><span class="usecode">" STEPRO10 "</span></p>
					<p><a target="_blank" href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'expert-hotel-booking' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'expert-hotel-booking' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DOCS_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'expert-hotel-booking' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Expert Hotel Booking.', 'expert-hotel-booking' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'expert-hotel-booking' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'expert-hotel-booking' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'expert-hotel-booking' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'expert-hotel-booking' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'expert-hotel-booking' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'expert-hotel-booking' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'expert-hotel-booking' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'expert-hotel-booking' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $expert_hotel_booking_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $expert_hotel_booking_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'expert-hotel-booking' ); ?>: <?php echo esc_html($expert_hotel_booking_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-hotel-booking' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-hotel-booking' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy Bundle', 'expert-hotel-booking' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-hotel-booking' ); ?></a>

					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $expert_hotel_booking_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function expert_hotel_booking_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-hotel-booking' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-hotel-booking' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy Bundle', 'expert-hotel-booking' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_HOTEL_BOOKING_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-hotel-booking' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'expert-hotel-booking' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'expert-hotel-booking' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'expert-hotel-booking' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'expert-hotel-booking' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'expert-hotel-booking' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a target="_blank" class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(EXPERT_HOTEL_BOOKING_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'expert-hotel-booking' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}