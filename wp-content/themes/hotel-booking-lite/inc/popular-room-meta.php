<?php

// Popular Room Meta
function hotel_booking_lite_bn_custom_meta_room() {
    add_meta_box( 'bn_meta', __( 'Popular Room Meta Feilds', 'hotel-booking-lite' ), 'hotel_booking_lite_meta_callback_room', 'post', 'normal', 'high' );
}

if (is_admin()){
  add_action('admin_menu', 'hotel_booking_lite_bn_custom_meta_room');
}

function hotel_booking_lite_meta_callback_room( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'hotel_booking_lite_room_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $hotel_booking_lite_room_address = get_post_meta( $post->ID, 'hotel_booking_lite_room_address', true );
    $hotel_booking_lite_room_price = get_post_meta( $post->ID, 'hotel_booking_lite_room_price', true );
    $hotel_booking_lite_room_price_discount = get_post_meta( $post->ID, 'hotel_booking_lite_room_price_discount', true );
    $hotel_booking_lite_room_rating = get_post_meta( $post->ID, 'hotel_booking_lite_room_rating', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Room Address', 'hotel-booking-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="hotel_booking_lite_room_address" id="hotel_booking_lite_room_address" value="<?php echo esc_html($hotel_booking_lite_room_address); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Room Price', 'hotel-booking-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="hotel_booking_lite_room_price" id="hotel_booking_lite_room_price" value="<?php echo esc_html($hotel_booking_lite_room_price); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Room Discount', 'hotel-booking-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="hotel_booking_lite_room_price_discount" id="hotel_booking_lite_room_price_discount" value="<?php echo esc_html($hotel_booking_lite_room_price_discount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Room Rating', 'hotel-booking-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="hotel_booking_lite_room_rating" id="hotel_booking_lite_room_rating" value="<?php echo esc_html($hotel_booking_lite_room_rating); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function hotel_booking_lite_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['hotel_booking_lite_room_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['hotel_booking_lite_room_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save
    if( isset( $_POST[ 'hotel_booking_lite_room_address' ] ) ) {
        update_post_meta( $post_id, 'hotel_booking_lite_room_address', strip_tags( wp_unslash( $_POST[ 'hotel_booking_lite_room_address' ]) ) );
    }

    if( isset( $_POST[ 'hotel_booking_lite_room_price' ] ) ) {
        update_post_meta( $post_id, 'hotel_booking_lite_room_price', strip_tags( wp_unslash( $_POST[ 'hotel_booking_lite_room_price' ]) ) );
    }

    if( isset( $_POST[ 'hotel_booking_lite_room_price_discount' ] ) ) {
        update_post_meta( $post_id, 'hotel_booking_lite_room_price_discount', strip_tags( wp_unslash( $_POST[ 'hotel_booking_lite_room_price_discount' ]) ) );
    }

    if( isset( $_POST[ 'hotel_booking_lite_room_rating' ] ) ) {
        update_post_meta( $post_id, 'hotel_booking_lite_room_rating', strip_tags( wp_unslash( $_POST[ 'hotel_booking_lite_room_rating' ]) ) );
    }
}
add_action( 'save_post', 'hotel_booking_lite_bn_metadesig_save' );
