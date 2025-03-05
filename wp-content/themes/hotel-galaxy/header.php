<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="mouse-cursor cursor-outer"></div>		
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#hg-wrapper"><?php esc_html_e( 'Skip to content', 'hotel-galaxy' ); ?></a>
		<?php do_action('hotelgalaxy_pre_loader');	?>
		<div id="header-container">				
			<?php get_template_part('template-parts/sections/section','header'); ?>
		</div>
		<div id="hg-wrapper" class="clearfix">
			<?php 			
			if ( !is_page_template( 'templates/template-frontpage.php' ) ) {				
				get_template_part('template-parts/sections/section','breadcrumb'); 
			}
		?>