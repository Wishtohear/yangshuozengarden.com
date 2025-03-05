<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hotelgalaxy_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }    

    return $classes;
}
add_filter( 'body_class', 'hotelgalaxy_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Backward compatibility for wp_body_open hook.
     *
     * @since 1.0.0
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}


if ( ! function_exists( 'hotelgalaxy_breadcrumb_title' ) ) {
 //Theme breadcrumb title

    function hotelgalaxy_breadcrumb_title(){

        if ( is_front_page() || is_home() ){

            single_post_title();

        }elseif ( is_category() ){

            printf( __( 'Category Archives: %s', 'hotel-galaxy' ), ( single_cat_title( '', false ) ));

        }elseif ( is_tag() ){

            printf( __( 'Tag Archives: %s', 'hotel-galaxy' ), ( single_tag_title( '', false ) ));

        }elseif ( is_404() ){

            printf( __( 'Error 404', 'hotel-galaxy' ));

        }elseif ( is_author() ){

            printf( __( 'Author: %s', 'hotel-galaxy' ), ( get_the_author( '', false ) ));        

        }elseif ( is_day() ) { 

            printf( __( 'Daily Archives: %s', 'hotel-galaxy' ), get_the_date() );

        }elseif ( is_month() ){

            printf( __( 'Monthly Archives: %s', 'hotel-galaxy' ), ( get_the_date( 'F Y' ) ));

        }elseif ( is_year() ) {

            printf( __( 'Yearly Archives: %s', 'hotel-galaxy' ), ( get_the_date( 'Y' ) ) );

        }elseif ( class_exists( 'woocommerce' ) ){

            if ( is_shop() ) {
                woocommerce_page_title();
            }
            
            elseif ( is_cart() ) {
                the_title();
            }
            
            elseif ( is_checkout() ) {
                the_title();
            }
            
            else {
                the_title();
            }

        }else {
            the_title();
        }

    }

}


if ( ! function_exists( 'hotelgalaxy_breadcrumb_content' ) ) {

    function hotelgalaxy_breadcrumb_content() {

    $showOnHome = esc_html__('1','hotel-galaxy');    // 1 - Show breadcrumbs on the homepage, 0 - don't show
    $delimiter  = '';   // Delimiter between breadcrumb
    $home       = esc_html__('Home','hotel-galaxy');     // Text for the 'Home' link
    $showCurrent= esc_html__('1','hotel-galaxy'); // Current post/page title in breadcrumb in use 1, Use 0 for don't show
    $before     = '<li class="active">'; // Tag before the current Breadcrumb
    $after      = '</li>'; // Tag after the current Breadcrumb
    $seprator   = get_theme_mod('seprator','/');

    global $post;
    $homeLink = home_url();

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
        
    } else {

        echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a> ' . '&nbsp' . wp_kses_post($seprator) . '&nbsp';
        
        if ( is_category() ) 
        {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
            echo $before . esc_html__('Archive by category','hotel-galaxy').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
            
        } 
        
        elseif ( is_search() ) 
        {
            echo $before . esc_html__('Search results for ','hotel-galaxy').' "' . esc_html(get_search_query()) . '"' . $after;
        } 
        
        elseif ( is_day() )
        {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp' . wp_kses_post($seprator) . '&nbsp';
            echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> '. '&nbsp' . wp_kses_post($seprator) . '&nbsp';
            echo $before . esc_html(get_the_time('d')) . $after;
        } 
        
        elseif ( is_month() )
        {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($seprator) . '&nbsp';
            echo $before . esc_html(get_the_time('F')) . $after;
        } 
        
        elseif ( is_year() )
        {
            echo $before . esc_html(get_the_time('Y')) . $after;
        } 
        
        elseif ( is_single() && !is_attachment() )
        {
            if ( get_post_type() != 'post' )
            {
                $post_type = get_post_type_object(get_post_type());

                $slug = $post_type->rewrite;
                echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($seprator) . '&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
            }
            else
            {
                if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
            }
            
        }
        
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            if ( class_exists( 'WooCommerce' ) ) {
                if ( is_shop() ) {
                    $thisshop = woocommerce_page_title();
                }
            }   
            else  {
                $post_type = get_post_type_object(get_post_type());
                if( isset($post_type->lables->singular)) {
                    $SingularName = $post_type->lables->singular;
                } else {
                    $SingularName = '';
                }
                echo $before  . $SingularName . $after;
            }   
        } 
        
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
        {
            $post_type = get_post_type_object(get_post_type());
            // echo $before . $post_type->labels->singular_name . $after;
            if( isset($post_type->lables->singular)) {
                $SingularName = $post_type->lables->singular;
            } else {
                $SingularName = '';
            }
            echo $before  . $SingularName . $after;
        } 
        
        elseif ( is_attachment() ) 
        {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); 
            if(!empty($cat)){
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($seprator) . '&nbsp');
            }
            echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
            
        } 
        
        elseif ( is_page() && !$post->post_parent ) 
        {
            if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
        } 
        
        elseif ( is_page() && $post->post_parent ) 
        {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) 
            {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp' . wp_kses_post($seprator) . '&nbsp';
                $parent_id  = $page->post_parent;
            }
            
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) 
            {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($seprator) . '&nbsp';
            }
            if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
            
        } 
        elseif ( is_tag() ) 
        {
            echo $before . esc_html__('Posts tagged ','hotel-galaxy').' "' . esc_html(single_tag_title('', false)) . '"' . $after;
        } 
        
        elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . esc_html__('Articles posted by ','hotel-galaxy').'' . $userdata->display_name . $after;
        } 
        
        elseif ( is_404() ) {
            echo $before . esc_html__('Error 404 ','hotel-galaxy'). $after;
        }
        
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
            echo ' ( ' . esc_html__('Page','hotel-galaxy') . '' . esc_html(get_query_var('paged')). ' )';
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
        }
        
        echo '</li>';
        
    }
}
}

/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_hotelgalaxy_dismissed_notice_handler', 'hotelgalaxy_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function hotelgalaxy_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function hotelgalaxy_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="hotelgalaxy-getting-started-notice clearfix">
                    <div class="hotelgalaxy-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'hotel-galaxy' ); ?>" />
                    </div><!-- /.hotelgalaxy-theme-screenshot -->
                    <div class="hotelgalaxy-theme-notice-content">
                        <h2 class="hotelgalaxy-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'hotel-galaxy' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('Install and activate <strong>Burger Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'hotel-galaxy')) ?></p>

                        <a class="hotelgalaxy-btn-get-started button button-primary button-hero hotelgalaxy-button-padding" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Get started with Hotel Galaxy', 'hotel-galaxy' ) ?></a><span class="hotelgalaxy-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.hotelgalaxy-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'hotelgalaxy_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'hotelgalaxy_admin_install_plugin' );

function hotelgalaxy_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/burger-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'burger-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'burger-companion/burger-companion.php' );
    }
}	