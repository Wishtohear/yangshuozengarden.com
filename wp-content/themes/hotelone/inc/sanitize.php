<?php
/**
 *  HotelOne Sanitize Functions.
 */
if ( ! function_exists( 'hotelone_sanitize_checkbox' ) ) {
    function hotelone_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return 0;
        }
    }
}

/**
 * Sanitize CSS code
 *
 * @param $string
 * @return string
 */
function hotelone_sanitize_css($string) {
    $string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
    $string = strip_tags($string);
    return trim( $string );
}

function hotelone_sanitize_color_alpha( $color ){
    $color = str_replace( '#', '', $color );
    if ( '' === $color ){
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color ) ) {
        // convert to rgb
        $colour = $color;
        if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
            return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return 'rgba('.join( ',', array( 'r' => $r, 'g' => $g, 'b' => $b, 'a' => 1 ) ).')';

    }

    return strpos( trim( $color ), 'rgb' ) !== false ?  $color : false;
}

/**
 * Sanitize repeatable data
 *
 * @param $input
 * @param $setting object $wp_customize
 * @return bool|mixed|string|void
 */
function hotelone_sanitize_repeatable_data_field( $input , $setting ){
    $control = $setting->manager->get_control( $setting->id );

    $fields = $control->fields;
    if ( is_string( $input ) ) {
        $input = json_decode( wp_unslash( $input ) , true );
    }
    $data = wp_parse_args( $input, array() );

    if ( ! is_array( $data ) ) {
        return false;
    }
    if ( ! isset( $data['_items'] ) ) {
        return  false;
    }
    $data = $data['_items'];

    foreach( $data as $i => $item_data ){
        foreach( $item_data as $id => $value ){

            if ( isset( $fields[ $id ] ) ){
                switch( strtolower( $fields[ $id ]['type'] ) ) {
                    case 'text':
                        $data[ $i ][ $id ] = sanitize_text_field( $value );
                        break;
                    case 'textarea':
                    case 'editor':
                        $data[ $i ][ $id ] = wp_kses_post( $value );
                        break;
                    case 'color':
                        $data[ $i ][ $id ] = sanitize_hex_color_no_hash( $value );
                        break;
                    case 'coloralpha':
                        $data[ $i ][ $id ] = hotelone_sanitize_color_alpha( $value );
                        break;
                    case 'checkbox':
                        $data[ $i ][ $id ] =  hotelone_sanitize_checkbox( $value );
                        break;
                    case 'select':
                        $data[ $i ][ $id ] = '';
                        if ( is_array( $fields[ $id ]['options'] ) && ! empty( $fields[ $id ]['options'] ) ){
                            // if is multiple choices
                            if ( is_array( $value ) ) {
                                foreach ( $value as $k => $v ) {
                                    if ( isset( $fields[ $id ]['options'][ $v ] ) ) {
                                        $value [ $k ] =  $v;
                                    }
                                }
                                $data[ $i ][ $id ] = $value;
                            }else { // is single choice
                                if (  isset( $fields[ $id ]['options'][ $value ] ) ) {
                                    $data[ $i ][ $id ] = $value;
                                }
                            }
                        }

                        break;
                    case 'radio':
                        $data[ $i ][ $id ] = sanitize_text_field( $value );
                        break;
                    case 'media':
                        $value = wp_parse_args( $value,
                            array(
                                'url' => '',
                                'id'=> false
                            )
                        );
                        $value['id'] = absint( $value['id'] );
                        $data[ $i ][ $id ]['url'] = sanitize_text_field( $value['url'] );

                        if ( $url = wp_get_attachment_url( $value['id'] ) ) {
                            $data[ $i ][ $id ]['id']   = $value['id'];
                            $data[ $i ][ $id ]['url']  = $url;
                        } else {
                            $data[ $i ][ $id ]['id'] = '';
                        }

                        break;
                    default:
                        $data[ $i ][ $id ] = wp_kses_post( $value );
                }

            }else {
                $data[ $i ][ $id ] = wp_kses_post( $value );
            }

            if ( count( $data[ $i ] ) !=  count( $fields ) ) {
                foreach ( $fields as $k => $f ){
                    if ( ! isset( $data[ $i ][ $k ] ) ) {
                        $data[ $i ][ $k ] = '';
                    }
                }
            }

        }
    }

    return $data;
}

function hotelone_sanitize_file_url( $file_url ) {
    $output = '';
    $filetype = wp_check_filetype( $file_url );
    if ( $filetype["ext"] ) {
        $output = esc_url( $file_url );
    }
    return $output;
}

/**
 * Conditional to show more hero settings
 *
 * @param $control
 * @return bool
 */
function hotelone_hero_fullscreen_callback ( $control ) {
    if ( $control->manager->get_setting('hotelone_hero_fullscreen')->value() == '' ) {
        return true;
    } else {
        return false;
    }
}

function hotelone_sanitize_select( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function hotelone_sanitize_number( $input ) {
    return balanceTags( $input );
}

function hotelone_sanitize_hex_color( $color ) {
    if ( $color === '' ) {
        return '';
    }
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }
    return null;
}

function hotelone_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}

function hotelone_sanitize_text( $string ) {
    return wp_kses_post( balanceTags( $string ) );
}

function hotelone_sanitize_html_input( $string ) {
    return wp_kses_allowed_html( $string );
}

function hotelone_showon_frontpage() {
    return is_page_template( 'template-homepage.php' );
    return true;
}

function hotelone_gallery_source_validate( $validity, $value ){
    if ( ! class_exists( 'hotelone_Plus' ) ) {
        if ( $value != 'page' ) {
            $validity->add('notice', sprintf( esc_html__('Upgrade to %1s to unlock this feature.', 'hotelone' ), '<a target="_blank" href="https://www.britetechs.com/plugins/hotelone-pro/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=hotelone_customizer#gallery">Hotelone Pro</a>' ) );
        }
    }
    return $validity;
}

function hotelone_upgrade_pro_msg(){
    return wp_kses_post( __('Upgrade to <a target="_blank" href="https://www.britetechs.com/theme/hotelone-pro/">Hotelone Pro</a> to be able to add more items and unlock other premium features!','hotelone'));
}