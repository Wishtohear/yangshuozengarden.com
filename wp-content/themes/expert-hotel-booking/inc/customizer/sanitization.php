<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Expert Hotel Booking
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function expert_hotel_booking_sanitize_checkbox( $expert_hotel_booking_checked ) {
	return ( ( isset( $expert_hotel_booking_checked ) && true == $expert_hotel_booking_checked ) ? true : false );
}

function expert_hotel_booking_switch_sanitization( $expert_hotel_booking_input ) {
    if ( true === $expert_hotel_booking_input ) {
        return 1;
    } else {
        return 0;
    }
}

function expert_hotel_booking_sanitize_choices( $expert_hotel_booking_input, $expert_hotel_booking_setting ) {
    global $wp_customize; 
    $expert_hotel_booking_control = $wp_customize->get_control( $expert_hotel_booking_setting->id ); 
    if ( array_key_exists( $expert_hotel_booking_input, $expert_hotel_booking_control->choices ) ) {
        return $expert_hotel_booking_input;
    } else {
        return $expert_hotel_booking_setting->default;
    }
}

function expert_hotel_booking_sanitize_float( $expert_hotel_booking_input ) {
    return filter_var($expert_hotel_booking_input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function expert_hotel_booking_sanitize_html( $expert_hotel_booking_html ) {
	return wp_kses_post( force_balance_tags( $expert_hotel_booking_html ) );
}

/* Sanitization Text*/
function expert_hotel_booking_sanitize_text( $expert_hotel_booking_text ) {
	return wp_filter_post_kses( $expert_hotel_booking_text );
}

function expert_hotel_booking_sanitize_phone_number( $expert_hotel_booking_phone ) {
    return preg_replace( '/[^\d+]/', '', $expert_hotel_booking_phone );
}
// Sanitization callback function for numeric input
function expert_hotel_booking_sanitize_numeric_input($expert_hotel_booking_input) {
    // Remove any non-numeric characters
    return preg_replace('/[^0-9]/', '', $expert_hotel_booking_input);
}

// Sanitization callback function for logo width
function expert_hotel_booking_sanitize_logo_width($expert_hotel_booking_input) {
    $expert_hotel_booking_input = absint($expert_hotel_booking_input); // Convert to integer
    // Ensure the value is between 1 and 150
    return ($expert_hotel_booking_input >= 1 && $expert_hotel_booking_input <= 150) ? $expert_hotel_booking_input : 150; // Default to 270 if out of range
}

function expert_hotel_booking_sanitize_copyright_position( $expert_hotel_booking_input ) {
    $expert_hotel_booking_valid = array( 'right', 'left', 'center' );

    if ( in_array( $expert_hotel_booking_input, $expert_hotel_booking_valid, true ) ) {
        return $expert_hotel_booking_input;
    } else {
        return 'right';
    }
}