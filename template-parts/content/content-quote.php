<div class="blogGrid__item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink( );?>" class=" blogGrid__item--qoute">
		<?php $quote_show  = get_field('quote_show'); ?>
		<?php $author_qoute  = get_field('author_qoute'); ?>
            <p class="droidItalic">"<?php echo $quote_show; ?>"</p>
            <div><hr><?php echo $author_qoute; ?></div>
        </a>			
		<div class="entry-content">
			<?php


			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cherry' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
