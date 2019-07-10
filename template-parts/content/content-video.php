<div class="blogGrid__item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $video_post = get_field('video_post'); ?>
        <a href="<?php the_permalink( );?>" class="blogGrid__item--iframe">
            <div class="embed-container">
                <?php echo $video_post ?>
            </div>           
            <!-- <iframe height="290px" width="100%" src="https://youtube.com/embed/watch?v=n5uz7egB9tA&list=RDn5uz7egB9tA&start_radio=1&t=546" frameborder="0" allowfullscreen></iframe> -->
            <p class="blogGrid__item__showUpercase"><?php the_title(); ?></p>
            <?php $blog_infomation = get_field('blog_infomation'); ?>
            <span><i class="fa fa-calendar"></i> <?php echo $blog_infomation['date_create_blog'] ?></span><span><i class="fa fa-eye"></i> <?php echo $blog_infomation['blog_views'] ?></span>
        </a>			
		<div class="entry-content">
			<?php
			// the_content(
			// 	sprintf(
			// 		wp_kses(
			// 			/* translators: %s: Name of current post. Only visible to screen readers */
			// 			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cherry' ),
			// 			array(
			// 				'span' => array(
			// 					'class' => array(),
			// 				),
			// 			)
			// 		),
			// 		get_the_title()
			// 	)
			// );

			// wp_link_pages(
			// 	array(
			// 		'before' => '<div class="page-links">' . __( 'Pages:', 'cherry' ),
			// 		'after'  => '</div>',
			// 	)
			// );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
