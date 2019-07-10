<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<section id="primary" class="content-area">
    <div class="container">
        <div class="bigTittle--dark">
            <p>Our Stories</p>
            <p class="bigTittle--sub">KEEP UPDATE WITH US</p>
        </div>
        <div class="blogGrid">           
            <?php
            if ( have_posts() ) {

                // Load posts loop.
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content',get_post_format() );
                }
            } else {

                // If no content, include the "No posts found" template.
                get_template_part( 'template-parts/content/content', 'none' );

            }
            ?>
        </div>
    </div>      
    <div class="btn--blogSpinner">
        <a href="#"><i class="fa fa-spinner"></i><span>LOAD MORE</span></a>
    </div>
</section><!-- .content-area -->

    

<?php
get_footer();
