<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Coffeehouse
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer large-layout-single-column" role="contentinfo">
		<nav role="navigation" class="site-navigation secondary-navigation layout-single-column">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'coffeehouse' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'coffeehouse' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'coffeehouse' ), 'coffeehouse', '<a href="http://underlost.net" rel="designer">Tyler RIlling</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
