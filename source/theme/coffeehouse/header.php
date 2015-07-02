<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Coffeehouse
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic|Open+Sans:700,400" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/coffeehouse.min.css">

<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/coffeehouse.min.js" type="text/javascript"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'coffeehouse' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<svg class="site-logo" version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 72.392" enable-background="new 0 0 100 72.392" xml:space="preserve">
				<path d="M58.823,17.958c7.955,0,14.862,4.381,18.675,10.834l22.476,0.026V16.637c0-4.533-3.647-8.21-8.121-8.21H8.096
				C3.608,8.427,0,12.104,0,16.637l0.023,12.078l40.112,0.027C43.975,22.312,50.854,17.958,58.823,17.958"></path>
				<path d="M21.006,4.56h-7.451l-0.861,2.715h8.931L21.006,4.56z"></path>
				<path d="M88.191,3.112h-9.921L76.51,7.3H89.8L88.191,3.112z"></path>
				<path d="M54.137,5.854h-8.539V1.678h8.539V5.854z M61.965,0H37.855l-4.967,7.352h33.625L61.965,0z"></path>
				<path d="M78.663,30.97c1.243,2.767,1.977,5.813,1.977,9.055c0,12.18-9.77,22.067-21.816,22.067
				c-12.062,0-21.829-9.888-21.829-22.067c0-3.242,0.723-6.288,1.976-9.069H0v33.252c0,4.507,3.608,8.184,8.096,8.184h83.756
				c4.474,0,8.121-3.677,8.121-8.184L100,30.97H78.663z"></path>
				<path d="M70.72,32.775c-0.342-0.615-0.773-1.192-1.242-1.741c-2.547-3.1-6.359-5.138-10.654-5.138
				c-4.309,0-8.121,2.026-10.668,5.112c-0.468,0.563-0.9,1.14-1.267,1.767c-1.278,2.127-2.052,4.585-2.052,7.25
				c0,7.788,6.26,14.114,13.987,14.114c7.689,0,13.95-6.326,13.95-14.114C72.773,37.361,72.013,34.903,70.72,32.775"></path>
			</svg></a>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coffeehouse' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
