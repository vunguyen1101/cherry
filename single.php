<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<?php $blog_tittle = get_field('blog_tittle'); ?>
<?php $blog_infomation = get_field('blog_infomation'); ?>
	<section>
        <div class="container">
            <div class="bigTittle--dark">
                <p><?php the_title(); ?></p>
                <p class="bigTittle--sub Author">
                    <span><i class="fa fa-calendar"></i><?php echo $blog_infomation['date_create_blog'] ?></span>
                    <span><i class="fa fa-eye"></i><?php echo $blog_infomation['blog_views'] ?></span>
                    <span><i class="fa fa-edit"></i><?php echo $blog_infomation['author'] ?></span>
                </p>
            </div>
    
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="aside">
					<?php $blog_large_image = get_field('blog_large_image'); ?>
                        <img src="<?php echo $blog_large_image['url'] ?>" alt="<?php echo $blog_large_image['alt'] ?>">
                        <div class="aside__SingleDcsrpt">
                        <?php
                            if ( have_posts() ) {

                                // Load posts loop.
                                while ( have_posts() ) {
                                    the_post();
                                    get_template_part( 'template-parts/content/content', 'single' );
                                    
                                }
                            } else {

                                // If no content, include the "No posts found" template.
                                get_template_part( 'template-parts/content/content', 'none' );

                            }
                        ?>
                        </div>
                        
                    </div>
                </div>
				<?php get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();
