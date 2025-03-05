<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Expert Hotel Booking
 */

if ( ! function_exists( 'expert_hotel_booking_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function expert_hotel_booking_posted_on() {
	$expert_hotel_booking_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$expert_hotel_booking_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$expert_hotel_booking_time_string = sprintf( $expert_hotel_booking_time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$expert_hotel_booking_posted_on = sprintf(
		/* translators: %1$s: Posted on. */
		esc_html_x( 'Posted on %s', 'post date', 'expert-hotel-booking' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $expert_hotel_booking_time_string . '</a>'
	);

	$expert_hotel_booking_byline = sprintf(
		/* translators: %1$s: by. */
		esc_html_x( 'by %s', 'post author', 'expert-hotel-booking' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $expert_hotel_booking_posted_on . '</span><span class="byline"> ' . $expert_hotel_booking_byline . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'expert_hotel_booking_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function expert_hotel_booking_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$expert_hotel_booking_categories_list = get_the_category_list( esc_html__( ', ', 'expert-hotel-booking' ) );
		if ( $expert_hotel_booking_categories_list && expert_hotel_booking_categorized_blog() ) {
			/* translators: %1$s: Posted in. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'expert-hotel-booking' ) . '</span>', $expert_hotel_booking_categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$expert_hotel_booking_tags_list = get_the_tag_list( '', esc_html__( ', ', 'expert-hotel-booking' ) );
		if ( $expert_hotel_booking_tags_list ) {
			/* translators: %1$s: Tagged. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'expert-hotel-booking' ) . '</span>', $expert_hotel_booking_tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'expert-hotel-booking' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'expert-hotel-booking' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function expert_hotel_booking_categorized_blog() {
	if ( false === ( $expert_hotel_booking_all_the_cool_cats = get_transient( 'expert_hotel_booking_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$expert_hotel_booking_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$expert_hotel_booking_all_the_cool_cats = count( $expert_hotel_booking_all_the_cool_cats );

		set_transient( 'expert_hotel_booking_categories', $expert_hotel_booking_all_the_cool_cats );
	}

	if ( $expert_hotel_booking_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so expert_hotel_booking_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so expert_hotel_booking_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in expert_hotel_booking_categorized_blog.
 */
function expert_hotel_booking_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'expert_hotel_booking_categories' );
}
add_action( 'edit_category', 'expert_hotel_booking_category_transient_flusher' );
add_action( 'save_post',     'expert_hotel_booking_category_transient_flusher' );

/**
 * Register Google fonts.
 */
function expert_hotel_booking_google_font() {
	$font_url      = '';
	$expert_hotel_booking_font_family   = array(
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900'
	);

	$expert_hotel_booking_fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $expert_hotel_booking_font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$expert_hotel_booking_contents = wptt_get_webfont_url( esc_url_raw( $expert_hotel_booking_fonts_url ) );
	return $expert_hotel_booking_contents;
}

function expert_hotel_booking_scripts_styles() {
    wp_enqueue_style( 'expert-hotel-booking-fonts', expert_hotel_booking_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'expert_hotel_booking_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function expert_hotel_booking_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');
}
