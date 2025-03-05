<?php 
/**
 * Register Google fonts for hotel galaxy.
 */
function hotelgalaxy_google_font() {
	
    $get_fonts_url = '';

    $font_families = array();

    $font_families = array('Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );

    $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

// primary menu cart 
if ( ! function_exists( 'hotelgalaxy_header_cart' ) ) {
    function hotelgalaxy_header_cart(){        
        $s_h_header_cart = get_theme_mod('s_h_header_cart', false );        
        if(! $s_h_header_cart){ return; } ?>
        <li class="cart-item">
            <a  href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart-toggle">
                <i class="fa fa-shopping-cart"></i>
                <?php 
                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                    $count = WC()->cart->cart_contents_count;
                    $cart_url = wc_get_cart_url();

                    if ( $count > 0 ) {
                        ?>
                        <span><?php echo esc_html( $count ); ?></span>
                        <?php 
                    }
                    else {
                        ?>
                        <span>0</span>
                        <?php 
                    }
                }
                ?>
            </a>
            <!-- Shopping Cart -->
            <div class="shopping-cart">
                <ul class="shopping-cart-items">
                    <?php get_template_part('woocommerce/cart/mini','cart'); ?>
                </ul>
            </div>
            <!--end shopping-cart -->
        </li>
    <?php }
}

// primary menu search 
if ( ! function_exists( 'hotelgalaxy_header_search' ) ) { 
    function hotelgalaxy_header_search() {    
       $s_h_search_icon = get_theme_mod('s_h_search_icon', true );       
       if ( ! $s_h_search_icon ) { return; }  ?>  
       <li class="search-item">
        <button class="header-search-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_search_box" aria-controls="offcanvas_search_box"><i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </li>
    <div class="offcanvas offcanvas_search_box offcanvas-top" tabindex="-1" id="offcanvas_search_box" aria-labelledby="offcanvasTopLabel">  
        <div class="container">    
            <div class="offcanvas-header"> 
                <button type="button" class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                </button> 
            </div>
        </div>   
        <div class="offcanvas-body">  
            <form method="get" class="search-form hg-navigation-search" action="<?php echo esc_url( home_url( '/' ) ) ?>"> 
                <input type="search" placeholder="Search Here..." class="search-field" value="<?php echo esc_attr( get_search_query() ) ?>" name="s" title="<?php echo  esc_attr_x( 'Search', 'label', 'hotel-galaxy' ) ?>"/>
                <button type="submit" class="search_box-search_btn" aria-label="<?php echo esc_attr( get_search_query() ) ?>">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button> 
            </form>   
        </div>
    </div>
    <?php  
}
}

if ( ! function_exists( 'hotelgalaxy_logo_site_ttl_description' ) ) {
    function hotelgalaxy_logo_site_ttl_description() {
        if(has_custom_logo()){   
            the_custom_logo();
        }
        else { 
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <h4 class="site-title">
                    <?php 
                    echo esc_html(bloginfo('name'));
                    ?>
                </h4>
            </a>    
            <?php                       
        }
        ?>
        <?php
        $description = get_bloginfo( 'description');
        if ($description) : ?>
            <p class="site-description"><?php echo $description; ?></p>
        <?php endif; 
    }
}

// rating star
if(!function_exists('hotelgalaxy_rating')){ 
    function hotelgalaxy_rating( $rating ){
        if( isset( $rating )){  
            echo '<span class="hg_rating">';  
            for( $i=0; $i < 5; $i++){
                if( ( $rating - $i ) > 0 ){
                    $class_active='active_rating ' . ( $rating-$i );
                }else{
                    $class_active = '';
                }
                echo sprintf('<i class="fa fa-star %1$s"></i>', esc_attr($class_active));
            }
            echo "</span>";
        }
    }
}



if ( ! function_exists( 'hotelgalaxy_dynamic_css' ) ) {
  function hotelgalaxy_dynamic_css(){

     $output_css = '';
    
    // footer
    $footer_bg_img            = get_theme_mod( 'footer_bg_img', get_template_directory_uri() .'/assets/images/footer-bg.jpg' );
    $footer_bg_img_opacity    = get_theme_mod( 'footer_bg_img_opacity','0.85' ); 
    $footer_bg_color          = get_theme_mod('footer_bg_color','');   

    if(!empty($footer_bg_color)){
      $output_css .="footer.site-footer-area{background-color:".esc_attr($footer_bg_color).";}";
    }else{
      $output_css .="footer.site-footer-area:before{background-image:linear-gradient(to right, rgb(0 0 0 / ".esc_attr( $footer_bg_img_opacity)."), rgb(0 0 0 / ".esc_attr( $footer_bg_img_opacity).")), url(".esc_url($footer_bg_img).");}";
    }  


    /**
     *  Typography Body
     */
     $hotelgalaxy_body_text_transform    = get_theme_mod('hotelgalaxy_body_text_transform','inherit');
     $hotelgalaxy_body_font_style      = get_theme_mod('hotelgalaxy_body_font_style','inherit');
     $hotelgalaxy_body_font_size       = get_theme_mod('hotelgalaxy_body_font_size','16');
     $hotelgalaxy_body_line_height     = get_theme_mod('hotelgalaxy_body_line_height','1.5');
    
     $output_css .=" body{ 
      font-size: " .esc_attr($hotelgalaxy_body_font_size). "px;
      line-height: " .esc_attr($hotelgalaxy_body_line_height). ";
      text-transform: " .esc_attr($hotelgalaxy_body_text_transform). ";
      font-style: " .esc_attr($hotelgalaxy_body_font_style). ";
    }\n";    
    
    /**
     *  Typography Heading
     */
     for ( $i = 1; $i <= 6; $i++ ) {  
       $hotelgalaxy_heading_text_transform  = get_theme_mod('hotelgalaxy_h' . $i . '_text_transform','inherit');
       $hotelgalaxy_heading_font_style    = get_theme_mod('hotelgalaxy_h' . $i . '_font_style','inherit');
       $hotelgalaxy_heading_font_size      = get_theme_mod('hotelgalaxy_h' . $i . '_font_size');
       $hotelgalaxy_heading_line_height      = get_theme_mod('hotelgalaxy_h' . $i . '_line_height');
       
       $output_css .=" h" . $i . "{ 
        font-size: " .esc_attr($hotelgalaxy_heading_font_size). "px;
        line-height: " .esc_attr($hotelgalaxy_heading_line_height). ";
        text-transform: " .esc_attr($hotelgalaxy_heading_text_transform). ";
        font-style: " .esc_attr($hotelgalaxy_heading_font_style). ";
      }\n";
     }     


      wp_add_inline_style( 'hotelgalaxy-style', $output_css );
  }

  add_action('wp_enqueue_scripts', 'hotelgalaxy_dynamic_css' );
}
