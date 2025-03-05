<header id="mastser-header" class="mastser-header mastser-header-one site-header" role="header">	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<div class="logo navbar-brand">
				<?php hotelgalaxy_logo_site_ttl_description(); ?>
			</div>
			<button class="navbar-toggler menu-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#header_navbar" aria-controls="header_navbar" aria-expanded="false" aria-label="Toggle navigation">
				<div class="top-line"></div>
				<div class="middle-line"></div>
				<div class="bottom-line"></div>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="header_navbar">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
					'walker' => new WP_Bootstrap_Navwalker()
				));
				?>
			</div>
			<div class="main-menu-right">
				<ul class="menu-right-list">					
					<?php hotelgalaxy_header_search(); ?>
					<?php hotelgalaxy_header_cart(); ?>					
				</ul>
			</div>
			<div class="header-above-btn">
				<button type="button" class="header-above-collapse navbar-toggler" data-bs-toggle="collapse" data-bs-target="#header_infobar" aria-controls="header_infobar" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
				</button>
			</div>
		</div>				
	</nav>
</header>
<?php
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'burger-companion/burger-companion.php' ) ) { 

	do_action( 'hotel_galaxy_Above_Header', false );

}else{
	do_action( 'hotelgalaxy_Above_Header', false );
} ?>