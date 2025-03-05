<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotel_inn
 */

$hotel_inn_options = hotel_inn_theme_options();
$facebook = $hotel_inn_options['facebook'];
$twitter = $hotel_inn_options['twitter'];
$instagram = $hotel_inn_options['instagram'];
$youtube = $hotel_inn_options['youtube'];
$email = $hotel_inn_options['email'];
$pinterest = $hotel_inn_options['pinterest'];


$header_phone = $hotel_inn_options['header_phone'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(get_option('hotel_inn_free_back_top_top_enable') && get_option('hotel_inn_free_back_top_top_enable') == "on" ){ ?>
<!-- Back to top -->
<div id="back-to-top" title="Go to top">
  <i class="fa fa-arrow-up" aria-hidden="true"></i>
</div>
<?php }?>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hotel-inn' ); ?></a>


<div class="main-wrap">
	<header id="masthead" class="site-header">

		<div class="container-fluid">
             <div class="row">
				

            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="navbar-collapse">

	             <?php
	                if (has_nav_menu('primary')) { ?>
	                <?php
	                    wp_nav_menu(array(
	                        'theme_location' => 'primary',
	                        'container' => '',
	                        'menu_class' => 'nav navbar-nav navbar-center',
	                        'menu_id' => 'menu-main',
	                        'walker' => new hotel_inn_nav_walker(),
	                        'fallback_cb' => 'hotel_inn_nav_walker::fallback',
	                    ));
	                ?>
	                <?php } else { ?>
	                    <nav id="site-navigation" class="main-navigation clearfix">
	                        <?php   wp_page_menu(array('menu_class' => 'menu','menu_id' => 'menuid')); ?>
	                    </nav>
	                <?php } ?>

	            </div><!-- End navbar-collapse -->

				<div class="site-branding">
					<?php
					the_custom_logo(); ?>
					<div class="logo-wrap">

					<?php

					if ( is_front_page() && is_home() ) :
						?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<?php
					else :
						?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<?php
					endif;
					$hotel_inn_description = get_bloginfo( 'description', 'display' );
					if ( $hotel_inn_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $hotel_inn_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
					</div>
				</div><!-- .site-branding -->

				<div class="search-wrap">
					<div class="header-social">

						<?php if($header_phone) 
						
                            echo '<div class="header-phone"><a href="tel:'.esc_html($header_phone).'"><span>'.esc_html($header_phone).'</span></a></div>';


						if($facebook) 
						echo '<div class="social-icon"><a href="'.esc_url($facebook).'"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a></div>';

						if($twitter) 
						echo '<div class="social-icon"><a href="'.esc_url($twitter).'"><i class="fa-brands fa-x-twitter"></i></a></div>';


						if($instagram) 
						echo '<div class="social-icon"><a href="'.esc_url($instagram).'"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></div>'; 
					
						if($youtube) 
						echo '<div class="social-icon"><a href="'.esc_url($youtube).'"><i class="fa-brands fa-youtube"></i></a></div>';

						if($pinterest) 
						echo '<div class="social-icon"><a href="'.esc_url($pinterest).'"><i class="fa-brands fa-pinterest-p"></i></a></div>';


						if($email) 
						echo '<div class="social-icon"><a href="'.esc_url($email).'"><i class="fa-regular fa-envelope"></i></a></div>'; 
					?>

					</div>
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
	                        data-target="#navbar-collapses" aria-expanded="false">
	                    <span class="sr-only"><?php echo esc_html__('Toggle navigation','hotel-inn'); ?></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>

				</div>
				

				<div class="collapse navbar-collapse" id="navbar-collapses">

	             <?php
	                if (has_nav_menu('primary')) { ?>
	                <?php
	                    wp_nav_menu(array(
	                        'theme_location' => 'primary',
	                        'container' => '',
	                        'menu_class' => 'nav navbar-nav navbar-center',
	                        'menu_id' => 'menu-main',
	                        'walker' => new hotel_inn_nav_walker(),
	                        'fallback_cb' => 'hotel_inn_nav_walker::fallback',
	                    ));
	                ?>
	                <?php } else { ?>
	                    <nav id="site-navigation" class="main-navigation clearfix">
	                        <?php   wp_page_menu(array('menu_class' => 'menu','menu_id' => 'menuid')); ?>
	                    </nav>
	                <?php } ?>

	            </div><!-- End navbar-collapse -->
	            
			</div>
		</div>
		
	</header><!-- #masthead -->
	<div class="breadcrumbs ">
			<div class="container">
				<?php if (function_exists('check_breadcrumb')) check_breadcrumb();   ?>
			</div>
		</div>
	<!-- /main-wrap -->
