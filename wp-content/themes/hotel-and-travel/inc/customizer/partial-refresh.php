<?php
/**
 * Best_Shop Customizer Partials
 *
 * @package Best_Shop
 */

if( ! function_exists( 'hotel_and_travel_customize_partial_blogname' ) ) :
/* Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_and_travel_customize_partial_blogname() {
	bloginfo( 'name' );
}
endif;

if( ! function_exists( 'hotel_and_travel_customize_partial_blogdescription' ) ) :
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_and_travel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
endif;



if( ! function_exists( 'hotel_and_travel_instagram_title' ) ) :
/**
 * Instagram Section Title
*/
function hotel_and_travel_instagram_title(){
    return hotel_and_travel_get_setting( 'instagram_title' );
}
endif;

if( ! function_exists( 'hotel_and_travel_related_posts_title' ) ) :
/**
 * Related Posts Title
*/
function hotel_and_travel_related_posts_title(){
    return hotel_and_travel_get_setting( 'related_post_title' );
}
endif;


if( ! function_exists( 'hotel_and_travel_banner_title' ) ) :
/**
 * Banner Title
*/
function hotel_and_travel_banner_title(){
    return hotel_and_travel_get_setting( 'banner_title');
}
endif;

if( ! function_exists( 'hotel_and_travel_banner_content' ) ) :
/**
 * Banner Content
*/
function hotel_and_travel_banner_content(){
    return hotel_and_travel_get_setting( 'banner_content');
}
endif;

if( ! function_exists( 'hotel_and_travel_banner_btn_label' ) ) :
/**
 * Banner Button Label
*/
function hotel_and_travel_banner_btn_label(){
    return hotel_and_travel_get_setting( 'banner_btn_label' );
}
endif;

if( ! function_exists( 'hotel_and_travel_banner_btn_two_label' ) ) :
/**
 * Banner Button Two Label
*/
function hotel_and_travel_banner_btn_two_label(){
    return hotel_and_travel_get_setting( 'banner_btn_two_label' );
}
endif;


if( ! function_exists( 'hotel_and_travel_get_footer_copyright' ) ) :
/**
 * Show Author link in footer
*/
function hotel_and_travel_get_footer_copyright(){
    
    $footer_link = hotel_and_travel_get_setting( 'footer_link' ) ;
    
    $copyright = hotel_and_travel_get_setting( 'footer_copyright' );
    
    apply_filters('hotel_and_travel_footer_link', $footer_link);
    
    echo '<span class="copy-right">';
    

        if(function_exists('hotel_and_travel_pro_textdomain')) {
            if($footer_link === ''){
                //hide link
                echo ' <span>' . wp_kses_post(hotel_and_travel_get_setting( 'footer_copyright' )) . '</a> ';   
            } else {
                //show link
                echo ' <a href="' . esc_url($footer_link) . '">' . wp_kses_post(hotel_and_travel_get_setting( 'footer_copyright' )) . '</a> ';   
            }
        } else{
            if($copyright === ''){
            //free text domain
                echo ' <a href="https://gradientthemes.com">' . esc_html__('A theme by Gradient Themes ©' , 'hotel-and-travel') . '</a> ';
            } else{
                echo ' <a href="https://gradientthemes.com">' . esc_html(hotel_and_travel_get_setting( 'footer_copyright' )).esc_html__(' - A theme by Gradient Themes ©', 'hotel-and-travel') . '</a> ';
            }
        }
    
    
        echo '</span>';
    }
    endif;

if( ! function_exists( 'hotel_and_travel_ed_author_link' ) ) :
/**
 * Show Author link in footer
*/
function hotel_and_travel_ed_author_link(){
    
    echo '<span class="author-link">'; 
    esc_html_e( 'Developed By ', 'hotel-and-travel' );
    echo '<a href="' . esc_url( hotel_and_travel_get_setting('footer_link') ) .'" rel="nofollow" target="_blank" class="link">' . esc_html__( 'Gradient Themes', 'hotel-and-travel' ) . '</a>';
    echo '</span>';
    
}
endif;



