<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hotel Galaxy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php
if ( have_comments() ) : ?>
	<div class="comment-list clearfix">
		<h3>
			<?php
			$comment_number = get_comments_number();
			$comment_title = apply_filters( 'hotelgalaxy_comment_form_title', sprintf( 
				esc_html( _nx(
					'%1$s thought on &ldquo;%2$s&rdquo;',
					'%1$s thoughts on &ldquo;%2$s&rdquo;',
					$comment_number,
					'comments title',
					'hotel-galaxy'
				) ),
				number_format_i18n( $comment_number ),
				get_the_title()
			) );

			echo esc_html( $comment_title );
			?>

		</h3>
		
		<ol class="media-list">
			<?php 

			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );

			?>
		</ol>
	</div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

	<nav id="comment-nav-below">
		<h2 class="assistive-text">
			<?php esc_html_e( 'Comment navigation', 'hotel-galaxy'); ?>
		</h2>
		<div class="nav-previous">
			<?php previous_comments_link( __( '&larr; Older Comments', 'hotel-galaxy') ); ?>
		</div>
		<div class="nav-next">
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'hotel-galaxy') ); ?>
		</div>
	</nav>

<?php endif;  ?>

<?php endif; ?>

<?php  

if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hotel-galaxy');  ?></p>
<?php 

endif;

comment_form();

?>	