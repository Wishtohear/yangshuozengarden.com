</div>
<?php
$s_h_copyright          = get_theme_mod( 's_h_copyright', true );
$s_h_footer_bottom      = get_theme_mod( 's_h_footer_bottom', true );
?>
<footer class="site-footer-area">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('hotelgalaxy-footer-widget-area')) {
                    dynamic_sidebar('hotelgalaxy-footer-widget-area');
                }
                ?>
            </div>
        </div>
    </div> 
    <?php
    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    if ( is_plugin_active( 'burger-companion/burger-companion.php' ) ) { 

        do_action( 'hotel_galaxy_footer_sections', false );

    }else{
        do_action( 'hotelgalaxy_footer_sections', false );
    } ?>
    <div class="copyright-bar">
       <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-12 text-center position-relative">
                <?php if ($s_h_copyright) { ?>
                    <div class="widget-left">                        
                        <?php  
                        echo  sprintf(
                            '<div class="copyright-text">&copy; %1$s %2$s &bull; %4$s <a href="%3$s"> %5$s</a></div>',
                            date('Y'),
                            get_bloginfo('name'),
                            esc_url('https://burgerthemes.com'),
                            _x('Powered by', 'burgersoftware', 'hotel-galaxy'),
                            __('burgersoftware', 'hotel-galaxy')
                        );                       

                        ?> 
                    </div>
                <?php } ?>
            </div>       
        </div>
    </div>
</div>
</footer>
<a href="javascript:void(0);" class="scroll-top" rel="nofollow"><i class="fa fa-arrow-up"></i></a> 
</div>
<?php wp_footer(); ?>
<div class="page-progress"></div>
</body>
</html>