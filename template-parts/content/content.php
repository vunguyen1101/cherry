<div class="blogGrid__item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a class="grid-item" href="<?php the_permalink( );?>" class="blogGrid__item--post">
			<?php	  
				if( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			?>
			<p class="blogGrid__item__showUpercase"><?php the_title(); ?></p>
			<?php $blog_infomation = get_field('blog_infomation'); ?>
			<span><i class="fa fa-calendar"></i><?php echo $blog_infomation['date_create_blog'] ?></span><span><i class="fa fa-eye"></i> <?php echo $blog_infomation['blog_views'] ?></span>
		</a>
			
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
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
