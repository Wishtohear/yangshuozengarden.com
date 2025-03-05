<?php
/**
 * Displays main header
 *
 * @package Hotel Booking Lite
 */
?>
<?php
$hotel_booking_lite_sticky_header = get_theme_mod('hotel_booking_lite_sticky_header');
    $hotel_booking_lite_data_sticky = "false";
    if ($hotel_booking_lite_sticky_header) {
        $hotel_booking_lite_data_sticky = "true";
    }
?>
<div class="top_header py-2 text-center text-md-start" data-sticky="<?php echo esc_attr($hotel_booking_lite_data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-9 align-self-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $hotel_booking_lite_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $hotel_booking_lite_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('hotel_booking_lite_logo_title',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php } ?>
                            <?php else : ?>
                              <?php if( get_theme_mod('hotel_booking_lite_logo_title',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $hotel_booking_lite_description = get_bloginfo( 'description', 'display' );
                            if ( $hotel_booking_lite_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('hotel_booking_lite_theme_description',false) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($hotel_booking_lite_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-3 col-sm-3 col-3 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-2 align-self-center text-center text-md-end">
                <?php if(get_theme_mod('hotel_booking_lite_phone') != ''){ ?>
                    <span><i class="fas fa-phone me-3"></i><a href="tel:<?php echo esc_html(get_theme_mod('hotel_booking_lite_phone','')); ?>"><?php echo esc_html(get_theme_mod('hotel_booking_lite_phone','')); ?></a></span>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-2 align-self-center">
                <div class="social-link">
                    <?php if(get_theme_mod('hotel_booking_lite_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('hotel_booking_lite_facebook_url','')); ?>"><i class="fab fa-facebook-f me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('hotel_booking_lite_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('hotel_booking_lite_twitter_url','')); ?>"><i class="fab fa-twitter me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('hotel_booking_lite_intagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('hotel_booking_lite_intagram_url','')); ?>"><i class="fab fa-instagram me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('hotel_booking_lite_linkedin_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('hotel_booking_lite_linkedin_url','')); ?>"><i class="fab fa-linkedin-in me-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('hotel_booking_lite_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('hotel_booking_lite_youtube_url','')); ?>"><i class="fab fa-youtube"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
