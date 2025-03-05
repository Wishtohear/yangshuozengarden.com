<?php
/**
 * Template part for displaying blog section
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */
?>
<?php $adventure_travelling_static_image = get_template_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if(get_theme_mod('adventure_travelling_blog_show_hide', true) != '') { ?>
<section id="static-blog">
    <div class="container">
        <?php if(get_theme_mod('adventure_travelling_blog_tittle') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('adventure_travelling_blog_tittle', '')); ?></h2>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                $adventure_travelling_postdata = get_theme_mod('adventure_travelling_static_blog_1');
                if($adventure_travelling_postdata){
                    $adventure_travelling_args = array(
                        'name' => esc_html($adventure_travelling_postdata, 'adventure-travelling'),
                        'post_type' => 'post',
                        'post_status' => 'publish'
                    );

                    $adventure_travelling_query = new WP_Query($adventure_travelling_args);
                    if($adventure_travelling_query->have_posts()) :
                        while($adventure_travelling_query->have_posts()) : $adventure_travelling_query->the_post(); ?>
                            <?php if(has_post_thumbnail()) { ?>
                                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                            <?php } else { echo ('<img src="'.$adventure_travelling_static_image.'">'); } ?>

                            <?php if(get_theme_mod('adventure_travelling_remove_date', true) != ''){ ?>
                                <div class="blog-info">
                                    <div class="dateday"><?php echo esc_html(get_the_date('d')); ?></div>
                                    <div class="month"><?php echo esc_html(get_the_date('M')); ?></div>
                                </div>
                            <?php } ?>

                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <div class="no-postfound">No post found</div>
                    <?php endif;
                } ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="row">
                    <?php
                    $adventure_travelling_postdata = get_theme_mod('adventure_travelling_static_blog_2');
                    if($adventure_travelling_postdata){
                        $adventure_travelling_args = array(
                            'name' => esc_html($adventure_travelling_postdata, 'adventure-travelling'),
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        );

                        $adventure_travelling_query = new WP_Query($adventure_travelling_args);
                        if($adventure_travelling_query->have_posts()) :
                            while($adventure_travelling_query->have_posts()) : $adventure_travelling_query->the_post(); ?>
                                <div class="col-lg-5 col-md-5">
                                    <?php if(has_post_thumbnail()) { ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                                    <?php } else { echo ('<img src="'.$adventure_travelling_static_image.'">'); } ?>
                                    <?php if(get_theme_mod('adventure_travelling_remove_date', true) != ''){ ?>
                                        <div class="blog-info">
                                            <div class="dateday"><?php echo esc_html(get_the_date('d')); ?></div>
                                            <div class="month"><?php echo esc_html(get_the_date('M')); ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                    <div class="read-more-btn">
                                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'adventure-travelling'); ?></a>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <div class="no-postfound">No post found</div>
                        <?php endif;
                    } ?>
                </div>
                <div class="mt-2 row">
                    <?php
                    $adventure_travelling_postdata = get_theme_mod('adventure_travelling_static_blog_3');
                    if($adventure_travelling_postdata){
                        $adventure_travelling_args = array(
                            'name' => esc_html($adventure_travelling_postdata, 'adventure-travelling'),
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        );

                        $adventure_travelling_query = new WP_Query($adventure_travelling_args);
                        if($adventure_travelling_query->have_posts()) :
                            while($adventure_travelling_query->have_posts()) : $adventure_travelling_query->the_post(); ?>
                                <div class="col-lg-5 col-md-5">
                                    <?php if(has_post_thumbnail()) { ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                                    <?php } else { echo ('<img src="'.$adventure_travelling_static_image.'">'); } ?>
                                    <?php if(get_theme_mod('adventure_travelling_remove_date', true) != ''){ ?>
                                        <div class="blog-info">
                                            <div class="dateday"><?php echo esc_html(get_the_date('d')); ?></div>
                                            <div class="month"><?php echo esc_html(get_the_date('M')); ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                    <div class="read-more-btn">
                                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'adventure-travelling'); ?></a>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <div class="no-postfound">No post found</div>
                        <?php endif;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
