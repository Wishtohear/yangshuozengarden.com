<?php
add_action( 'admin_menu', 'resort_hotel_inn_getting_started' );
function resort_hotel_inn_getting_started() {
	add_theme_page( esc_html__('Get Started', 'resort-hotel-inn'), esc_html__('Get Started', 'resort-hotel-inn'), 'edit_theme_options', 'resort-hotel-inn-guide-page', 'resort_hotel_inn_test_guide');
}

// Add a Custom CSS file to WP Admin Area
function resort_hotel_inn_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
}
add_action('admin_enqueue_scripts', 'resort_hotel_inn_admin_theme_style');

//guidline for about theme
function resort_hotel_inn_test_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'resort-hotel-inn' );
?>
	<div class="wrapper-outer">
		<div class="intro">
			<h3><?php echo esc_html( $theme->Name ); ?></h3>
			<p><?php esc_html_e( 'Free Full Site Editing WordPress Theme', 'resort-hotel-inn' ); ?></p>
			<div class="banner-buttons">
				<a href="<?php echo esc_url( RESORT_HOTEL_INN_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Theme Documentation', 'resort-hotel-inn'); ?></a>
			</div>
		</div>
		<div class="left-main-box">
			<div class="about-wrapper">
				<div class="col-left">
					<p><?php echo esc_html( $theme->get( 'Description' ) ); ?></p>
				</div>
				<div class="col-right">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/screenshot.png" alt="" />
				</div>
			</div>
			<div class="support-wrapper">
				<div class="review-box">
					<i class="dashicons dashicons-star-filled"></i>
					<h4><?php esc_html_e('Leave Us A Review', 'resort-hotel-inn'); ?></h4>
					<p><?php esc_html_e('Are you enjoying our theme? We would love to hear your feedback.', 'resort-hotel-inn'); ?></p>
					<div class="support-button">
						<a class="button button-primary" href="<?php echo esc_url( RESORT_HOTEL_INN_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate Us', 'resort-hotel-inn'); ?></a>
					</div>
				</div>
				<div class="support-box">
					<i class="dashicons dashicons-microphone"></i>
					<h4><?php esc_html_e('Need Help?', 'resort-hotel-inn'); ?></h4>
					<p><?php esc_html_e('Go to our support forum to help you out in case of queries.', 'resort-hotel-inn'); ?></p>
					<div class="support-button">
						<a class="button button-primary" href="<?php echo esc_url( RESORT_HOTEL_INN_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Get Support', 'resort-hotel-inn'); ?></a>
					</div>
				</div>
				<div class="editor-box">
					<i class="dashicons dashicons-admin-appearance"></i>
					<h4><?php esc_html_e('Theme Customization', 'resort-hotel-inn'); ?></h4>
					<p><?php esc_html_e('Effortlessly modify and maintain your site using editor.', 'resort-hotel-inn'); ?></p>
					<div class="support-button">
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank"><?php esc_html_e('Site Editor', 'resort-hotel-inn'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="right-main-box">
			<div class="pro-box">
				<i class="dashicons dashicons-cover-image"></i>
				<h4><?php esc_html_e('Go For Premium', 'resort-hotel-inn'); ?></h4>
				<p><?php esc_html_e('Are you exited for our theme? Proceed for pro version of theme.', 'resort-hotel-inn'); ?></p>
				<div class="pro-buttons">
					<a class="button button-primary doc-btn" href="<?php echo esc_url( RESORT_HOTEL_INN_PRO_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'resort-hotel-inn'); ?></a>
					<a class="button button-primary buy-btn" href="<?php echo esc_url( RESORT_HOTEL_INN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'resort-hotel-inn'); ?></a>
					<a class="button button-primary demo-btn" href="<?php echo esc_url( RESORT_HOTEL_INN_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e('Pro Demo', 'resort-hotel-inn'); ?></a>
				</div>
				<ul class="pro-list">
					<li><?php esc_html_e('Responsive Design', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Demo Content Import', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Aditional plugins', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Background sliders', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Video popups', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('More Fonts and Colors', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Multiple templates', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Multiple front page sections', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Woocommerce support', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Premium support', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('SEO optimization', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Speed optimization', 'resort-hotel-inn');?></li>
					<li><?php esc_html_e('Browser compatibility', 'resort-hotel-inn');?></li>
			</div>
		</div>
	</div>
<?php } ?>