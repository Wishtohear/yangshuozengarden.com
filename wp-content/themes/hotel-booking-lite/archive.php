<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotel Booking Lite
 */

get_header(); ?>

    <div id="skip-content" class="container">
        <div class="row">
            <div id="primary" class="content-area <?php echo is_active_sidebar('sidebar') ? "col-lg-9 col-lg-8" : "col-lg-12"; ?>">
                <main id="main" class="site-main module-border-wrap">
                    <?php if (have_posts()) { ?>

                        <header class="page-header">
                            <?php
                            the_archive_title('<h2 class="page-title">', '</h2>');
                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </header>

                        <div class="row">
                            <?php /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                
                                get_template_part( 'template-parts/content',get_post_format());

                            endwhile; ?>
                        </div>
                            
                        <?php if( get_theme_mod('hotel_booking_lite_post_page_pagination',1) == 1){ 
                            the_posts_navigation();
                        }

                    }else {

                        get_template_part('template-parts/content', 'none');

                    } ?>
                    
                </main>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();