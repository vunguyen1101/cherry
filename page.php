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
<?php $tittle = get_field('tittle'); ?>
	<p><?php echo $tittle['big_tittle'] ?></p>
	echo 'pages';
<?php
get_footer();
