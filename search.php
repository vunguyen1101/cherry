<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section id="primary" class="content-area">
    <div class="container">
        <div class="search-info">
                <!--Sử dụng query để hiển thị số kết quả tìm kiếm được tìm thấy
                        Cũng như hiển thị từ khóa tìm kiếm. Từ khóa tìm kiếm cũng
                        có thể hiển thị được với hàm get_search_query()-->
                <?php
                        $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
                        $search_keyword = esc_html( $s, 1);
                        $search_count = $search_query->post_count;
                        // var_dump( $search_query );
                        printf( __('<h1>Search results for <strong>" %1$s " </strong>. We found <strong>%2$s</strong> articles for you.</h1>', 'cherry'), $search_keyword, $search_count );
                ?>
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
</section><!-- .content-area -->
  

	
<?php
get_footer();
