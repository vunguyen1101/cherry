<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header--colorfill">
		<div class="container"> 	 
			<div class="header__flexbox">
				<div class="header__logo">
				<?php if ( is_home() ) {
					printf(
						'<a href="%1$s">CHERRY</a>',
						get_bloginfo( 'url' )
					);
					} else {
					printf(
						'<a href="%1$s">CHERRY</a>',
						get_bloginfo( 'url' )
					);
					} // endif ?>
				</div>		
				<?php cherry_menu( 'primary-menu' ); ?>		
				<div class="nav__hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div> 
		</div>
			
</header>


