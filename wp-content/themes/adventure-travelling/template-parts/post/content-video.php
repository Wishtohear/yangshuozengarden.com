<?php
/**
 * Template part for displaying posts
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<?php $adventure_travelling_column_layout = get_theme_mod( 'adventure_travelling_sidebar_post_layout');
if($adventure_travelling_column_layout == 'four-column' || $adventure_travelling_column_layout == 'three-column' ){ ?>
  <div id="category-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="page-box">
        <?php
          if ( ! is_single() ) {
            // If not a single post, highlight the video file.
            if ( ! empty( $video ) ) {
              foreach ( $video as $video_html ) {
                echo '<div class="entry-video">';
                  echo $video_html;
                echo '</div>';
              }
            };
          };
        ?> 
        <div class="box-content mt-2 text-center">
            <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
              <?php 
              $adventure_travelling_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
              foreach ($adventure_travelling_blog_archive_ordering as $adventure_travelling_blog_data_order) : 
                  if ('date' === $adventure_travelling_blog_data_order) : ?>
                      <i class="far fa-calendar-alt mb-1"></i>
                      <a href="<?php echo esc_url(get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'))); ?>" class="entry-date">
                          <?php echo esc_html(get_the_date('j F, Y')); ?>
                      </a>
                  <?php elseif ('author' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-user mb-1"></i>
                      <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry-author">
                          <?php the_author(); ?>
                      </a>
                  <?php elseif ('comment' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-comments mb-1"></i>
                      <a href="<?php comments_link(); ?>" class="entry-comments">
                          <?php comments_number(__('0 Comments', 'adventure-travelling'), __('1 Comment', 'adventure-travelling'), __('% Comments', 'adventure-travelling')); ?>
                      </a>
                  <?php elseif ('category' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-list mb-1"></i>
                      <?php
                      $categories = get_the_category();
                      if (!empty($categories)) :
                          foreach ($categories as $category) : ?>
                              <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="entry-category">
                                  <?php echo esc_html($category->name); ?>
                              </a>
                          <?php endforeach;
                      endif; ?>
                  <?php endif;
              endforeach; ?>
          </div>
          <p><?php echo esc_html(adventure_travelling_excerpt_function());?></p>
          <?php if(get_theme_mod('adventure_travelling_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'adventure-travelling' ); ?>"><?php echo esc_html(get_theme_mod('adventure_travelling_read_more_text',__('Read More','adventure-travelling')));?></a>
            </div>
          <?php }?>
        </div>
        <div class="clearfix"></div>
      </div>
    </article>
  </div>
<?php } else{ ?>
<div id="category-post">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-box row">
    <?php $adventure_travelling_post_layout = get_theme_mod( 'adventure_travelling_post_layout','image-content');
    if($adventure_travelling_post_layout == 'image-content'){ ?>
      <div class="col-lg-6 col-md-12 align-self-center">
        <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };
        };
        ?> 
      </div>
      <div class="box-content col-lg-6 col-md-12">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <div class="box-info">
              <?php 
              $adventure_travelling_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
              foreach ($adventure_travelling_blog_archive_ordering as $adventure_travelling_blog_data_order) : 
                  if ('date' === $adventure_travelling_blog_data_order) : ?>
                      <i class="far fa-calendar-alt mb-1"></i>
                      <a href="<?php echo esc_url(get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'))); ?>" class="entry-date">
                          <?php echo esc_html(get_the_date('j F, Y')); ?>
                      </a>
                  <?php elseif ('author' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-user mb-1"></i>
                      <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry-author">
                          <?php the_author(); ?>
                      </a>
                  <?php elseif ('comment' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-comments mb-1"></i>
                      <a href="<?php comments_link(); ?>" class="entry-comments">
                          <?php comments_number(__('0 Comments', 'adventure-travelling'), __('1 Comment', 'adventure-travelling'), __('% Comments', 'adventure-travelling')); ?>
                      </a>
                  <?php elseif ('category' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-list mb-1"></i>
                      <?php
                      $categories = get_the_category();
                      if (!empty($categories)) :
                          foreach ($categories as $category) : ?>
                              <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="entry-category">
                                  <?php echo esc_html($category->name); ?>
                              </a>
                          <?php endforeach;
                      endif; ?>
                  <?php endif;
              endforeach; ?>
          </div>
        <p><?php echo esc_html(adventure_travelling_excerpt_function());?></p>
        <?php if(get_theme_mod('adventure_travelling_remove_read_button',true) != ''){ ?>
          <div class="readmore-btn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'adventure-travelling' ); ?>"><?php echo esc_html(get_theme_mod('adventure_travelling_read_more_text',__('Read More','adventure-travelling')));?></a>
          </div>
        <?php }?>
      </div>
    <?php }
    else if($adventure_travelling_post_layout == 'content-image'){ ?>
      <div class="box-content col-lg-6 col-md-12">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <div class="box-info">
              <?php 
              $adventure_travelling_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
              foreach ($adventure_travelling_blog_archive_ordering as $adventure_travelling_blog_data_order) : 
                  if ('date' === $adventure_travelling_blog_data_order) : ?>
                      <i class="far fa-calendar-alt mb-1"></i>
                      <a href="<?php echo esc_url(get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'))); ?>" class="entry-date">
                          <?php echo esc_html(get_the_date('j F, Y')); ?>
                      </a>
                  <?php elseif ('author' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-user mb-1"></i>
                      <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry-author">
                          <?php the_author(); ?>
                      </a>
                  <?php elseif ('comment' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-comments mb-1"></i>
                      <a href="<?php comments_link(); ?>" class="entry-comments">
                          <?php comments_number(__('0 Comments', 'adventure-travelling'), __('1 Comment', 'adventure-travelling'), __('% Comments', 'adventure-travelling')); ?>
                      </a>
                  <?php elseif ('category' === $adventure_travelling_blog_data_order) : ?>
                      <i class="fas fa-list mb-1"></i>
                      <?php
                      $categories = get_the_category();
                      if (!empty($categories)) :
                          foreach ($categories as $category) : ?>
                              <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="entry-category">
                                  <?php echo esc_html($category->name); ?>
                              </a>
                          <?php endforeach;
                      endif; ?>
                  <?php endif;
              endforeach; ?>
          </div>
        <p><?php echo esc_html(adventure_travelling_excerpt_function());?></p>
        <?php if(get_theme_mod('adventure_travelling_remove_read_button',true) != ''){ ?>
          <div class="readmore-btn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'adventure-travelling' ); ?>"><?php echo esc_html(get_theme_mod('adventure_travelling_read_more_text',__('Read More','adventure-travelling')));?></a>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-6 col-md-12 align-self-center  pt-lg-0 pt-3">
        <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };
        };
        ?> 
      </div>
    <?php }?>
      <div class="clearfix"></div>
    </div>
  </article>
</div>
<?php } ?>