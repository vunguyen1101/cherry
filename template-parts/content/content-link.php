<div class="blogGrid__item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink( );?>" class=" blogGrid__item--qoute">
            <p class="blogGrid__item__showUpercase"><?php the_title(); ?></p>
            <div>
			<?php $link_post = get_field('link_post'); ?>
                <span>
                    <i class="fa fa-link"></i><?php echo $link_post ?>
                </span>
            </div>
        </a>			
		<div class="entry-content">
			<?php
				// if ( ! is_single() && ! is_page() ) :
				// 	the_excerpt();
				// else :
				// 	the_content(
				// 		sprintf(
				// 			wp_kses(
				// 				/* translators: %s: Name of current post. Only visible to screen readers */
				// 				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cherry' ),
				// 				array(
				// 					'span' => array(
				// 						'class' => array(),
				// 					),
				// 				)
				// 			),
				// 			get_the_title()
				// 		)
				// 	);
				// 	wp_link_pages(
				// 		array(
				// 			'before' => '<div class="page-links">' . __( 'Pages:', 'cherry' ),
				// 			'after'  => '</div>',
				// 		)
				// 	);
				// endif;
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
