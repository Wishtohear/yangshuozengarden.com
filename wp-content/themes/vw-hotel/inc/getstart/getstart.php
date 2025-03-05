<?php
//about theme info
add_action( 'admin_menu', 'vw_hotel_gettingstarted' );
function vw_hotel_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Hotel', 'vw-hotel'), esc_html__('About VW Hotel', 'vw-hotel'), 'edit_theme_options', 'vw_hotel_guide', 'vw_hotel_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_hotel_admin_theme_style() {
   wp_enqueue_style('vw-hotel-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-hotel-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_hotel_admin_theme_style');

//guidline for about theme
function vw_hotel_mostrar_guide() { 
	//custom function about theme customizer
	$vw_hotel_return = add_query_arg( array()) ;
	$vw_hotel_theme = wp_get_theme( 'vw-hotel' );
?>

<div class="wrap getting-started">
		<div class="getting-started__header">
	    	<div>
                <h2 class="tgmpa-notice-warning"></h2>
            </div>
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to VW Hotel ', 'vw-hotel' ); ?></h2>
						
						<p class="version"><?php esc_html_e( 'Version', 'vw-hotel' ); ?>: <?php echo esc_html($vw_hotel_theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'vw-hotel' ); ?>	
						</span>
    					
						<div class="powered-by">
							<p ><strong><?php esc_html_e( 'All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.', 'vw-hotel' ); ?></strong></p>
													
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_HOTEL_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-hotel'); ?></a>
						<a href="<?php echo esc_url( VW_HOTEL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-hotel'); ?></a>
						<a href="<?php echo esc_url( VW_HOTEL_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-hotel'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup VW Hotel Theme', 'vw-hotel' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'VW Hotel is a refreshing, attractive and modern WordPress theme for hotel, restaurant, eatery, food joint, bakery, barbeque and grill house, café and similar food businesses. It can serve itself for resorts, holiday homes, Hospitality Sector, travel and tourism, accommodations, Party planning business, lodging, honeymoon resort, adventure resorts, eatry, guest houses, travel websites, cuisines, recipes, hostel, resort, Hotel Management, Resort Booking, Hospitality, Luxury Accommodations, Boutique Hotel, cloud kitchen, room reservation, chalet, bed and breakfast, Entertaintment Club, Amusement Park, Water Park, Campground, accommodation services, motel, rent, seasonal pricing, booking management, apartment, Luxury Hotel, inn, boarding house, lodge, aparthotel, boatel, City Hotel, Beach Hotel, Mountain Hotel, Apartment, booking, wedding planners, Hotel booking theme, resort, summer resort, vacation, lodges and hospitality business as well. A peppy design full of complimenting colors and fonts is all it has to build up a great hotel theme. The theme is undoubtedly responsive and cross-browser compatible to look beautiful on mobiles, tablets, iPads, desktops and across all browsers. You can add coupon code for room discount also. Customization is offered to change each and every part of the theme according to your will. It has multiple slides that can be used in banners and other places to display amazing offers and delicacies to leverage people into opting your services. The theme is SEO-friendly to dominate the search results. You can also add custom CSS. It has many features like Grid Layout, Editor Style, light-weight and hence loads fast and many more. It is built on Bootstrap framework to ease the process of using it for developers and novice user. It uses social media icons to get maximum user attention. You can display your most popular dishes, other exclusive services and hotel ambience through gallery. We have made provision to share some cooking and recipe tips in blogs. It has a testimonial section where users can share their valuable feedback. It has Four Columns layout for the blog posts.', 'vw-hotel' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','vw-hotel'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-hotel'); ?></a> <?php esc_html_e( 'your website.','vw-hotel'); ?> </li>
							<li><?php esc_html_e( 'VW Hotel','vw-hotel'); ?> <a target="_blank" href="<?php echo esc_url( VW_HOTEL_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Documentation','vw-hotel'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','vw-hotel'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive1.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','vw-hotel'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'This premium WordPress hotel theme is inviting, eye-catching and modern with an appeal to the visitors. The multipurpose theme can be used for variety of food businesses like hotels, restaurants, barbeques, grill houses, cafes, bakery, food joints and other eateries. It can cater websites of lodges, holiday homes, guest houses, inn and other room reservation services. The premium theme offers numerous features and functionality to craft out a highly efficient site for your business. It is made clean and user-friendly. It maintains WordPress standards of coding for a bug-free site. With customization allowed on an array of elements, the theme can be tweaked to get a great design. Another way of changing the feel and look of the theme is by trying combinations of colour options and Google fonts. Banners and sliders are used to enhance the look of your site. With regular theme updates and prompt customer support, it becomes all the more handy to use.', 'vw-hotel' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','vw-hotel'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Theme options using customizer API','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Responsive design','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Favicon, logo, title, and tagline customization','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Advanced color options and color pallets','vw-hotel'); ?></li>
										<li><?php esc_html_e( '100+ font family options','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Header with a call to action button','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Simple menu option','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'SEO friendly','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Pagination option','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Compatible with different WordPress famous plugins like contact form 7','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on all sections','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Responsive Layout for All Devices','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Footer customization options','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Fully integrated with the latest font awesome','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Background image option','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Custom Page Templates','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Sticky post & comment threads','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Parallax image-background section','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Customizable home page','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Footer widgets & editor style','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Social media feature','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Slider with unlimited number of slides','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Services section with custom post type','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Video section','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Record section','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Team and testimonial section with custom post type','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Testimonials section with custom post type','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Contact page template','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Social media widget for footer','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Shortcodes for all team and testimonial','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'woocommerce product section','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Rooms post type','vw-hotel'); ?></li>
										<li><?php esc_html_e( 'Gallery post type','vw-hotel'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','vw-hotel'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOTEL_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','vw-hotel'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOTEL_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','vw-hotel'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','vw-hotel'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','vw-hotel'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-hotel'); ?></a> <?php esc_html_e( 'your website.','vw-hotel'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','vw-hotel'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOTEL_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','vw-hotel'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( VW_HOTEL_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','vw-hotel'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','vw-hotel'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( VW_HOTEL_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-hotel'); ?></a>
					</ol>
				</div>
			</div>
		</div>
</div>
<?php } ?>