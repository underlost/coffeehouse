<?php
/**
 * Template part for displaying posts.
 *
 * @package Coffeehouse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header large-layout-single-column">
		<?php if ( has_post_thumbnail() ) { ?>
    		<div class="photo photo-featured large-layout-single-column">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'coffeehouse-large');
    		echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute('echo=0') . '" >'; ?>
    		<figure><?php the_post_thumbnail('large');?></figure>
    		<?php echo '</a>'; ?> </div>
		<?php } else { ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php } ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php coffeehouse_posted_on(); ?>
			<?php coffeehouse_comments_link(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content large-layout-single-column">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'coffeehouse' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coffeehouse' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer large-layout-single-column sr-only">
		<?php coffeehouse_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
