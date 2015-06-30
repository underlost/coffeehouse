<?php
/**
 * Template part for displaying single posts.
 *
 * @package Coffeehouse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php coffeehouse_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="photo photo-featured large-layout-single-column">
			<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'seattle-large');
			echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute('echo=0') . '" >'; ?>
			<figure><?php the_post_thumbnail('large');?></figure>
			<?php echo '</a>'; ?> </div>
		<?php } ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coffeehouse' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php coffeehouse_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
