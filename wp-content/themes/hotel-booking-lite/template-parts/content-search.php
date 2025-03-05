<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotel Booking Lite
 */
?>

<div class="col-lg-6 col-md-6 col-sm-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
        <?php if ( has_post_thumbnail() ) { ?><?php hotel_booking_lite_post_thumbnail(); ?><?php }?>
        <div class="entry-summary p-3 m-0">
            <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
            <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('hotel_booking_lite_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('hotel_booking_lite_post_page_excerpt_suffix','[...]')); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','hotel-booking-lite'); ?></a>
        </div>
    </article>
</div>