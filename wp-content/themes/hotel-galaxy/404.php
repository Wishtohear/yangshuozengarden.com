<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Hotel Galaxy
 */

get_header();
?>
<section class="404-template-area pt-0">
	<div class="container">
		<div class="content-area">
			<div class="row">
				<div class="col-lg-6 col-12 text-center mx-auto">
					<div class="card-404">						
						<h2><?php esc_html_e('O','hotel-galaxy'); ?><span class="text-primary"><?php esc_html_e('pp','hotel-galaxy'); ?></span><?php esc_html_e('s','hotel-galaxy'); ?></h2>
						<h1><?php esc_html_e('4','hotel-galaxy'); ?><i class="fa fa-smile-o"></i><?php esc_html_e('4','hotel-galaxy'); ?></h1>
						<h4><?php esc_html_e('The page you were looking for could not be found.','hotel-galaxy'); ?></h4>
						<div class="card-404-btn mt-3">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-like-icon"><?php esc_html_e('Go to Home','hotel-galaxy'); ?> <span class="bticn"><i class="fa fa-home"></i></span></a>
						</div>
						
					</div>
				</div>				
			</div>
		</div>
	</div>	
</section>

<?php get_footer(); ?>