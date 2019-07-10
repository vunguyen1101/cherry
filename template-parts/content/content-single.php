<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php
            if ( ! is_single() && ! is_page() ) :
                the_excerpt();
            else :
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cherry' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                        
                    )
                );
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'cherry' ),
                        'after'  => '</div>',
                    )
                );
            endif;
        ?>
    </div><!-- .entry-content -->
    <div class="aside__tagDcript">
        <?php the_tags(); ?>
        <span class="tagMedia">
            <span class="blurmedia">
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('facebook_single')) ?>"><i class="fa fa-facebook"></i></a>    
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('twitter_single')) ?>"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('googleplus_single')) ?>"><i class="fa fa-google-plus "></i></a>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('pinterest_single')) ?>"><i class="fa fa-pinterest-p"></i></a>
                <i class="fa fa-print "></i>
            </span>
        </span> 
    </div>
</article><!-- #post-<?php the_ID(); ?> -->