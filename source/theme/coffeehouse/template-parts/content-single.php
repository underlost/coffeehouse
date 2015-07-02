<?php
/**
 * Template part for displaying single posts.
 *
 * @package Coffeehouse
 */

?>

<?php if ( has_post_format( 'quote' )) { ?>
	<?php if ( has_post_thumbnail() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'coffeehouse-large');
	echo ' style="background-image: url(' . $large_image_url[0] . ')"'; ?>>
	<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php endif; ?>

	<div class="article-wrap">
		<header class="entry-header layout-single-column">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	    <div class="entry-summary layout-single-column">
	        <?php the_excerpt(); ?>
	    </div><!-- .entry-summary -->
	    <?php else : ?>
	    <div class="entry-content layout-single-column">
	        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'seattle' ) ); ?>
	        <?php
	            wp_link_pages( array(
	                'before' => '<div class="page-links">' . __( 'Pages:', 'seattle' ),
	                'after'  => '</div>',
	            ) );
	        ?>
	    </div><!-- .entry-content -->
	    <?php endif; ?>
	</div><!-- .format-quote -->
<?php } elseif ( has_post_format( 'aside' )) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content large-layout-single-column">
			<div class="row">
			<?php if ( has_post_thumbnail() ) { ?>
	    		<div class="photo photo-featured col-md-6">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'coffeehouse-large');
	    		echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute('echo=0') . '" >'; ?>
	    		<figure><?php the_post_thumbnail('large');?></figure>
	    		<?php echo '</a>'; ?> </div>
			<?php } ?>
				<div class="col-md-5 col-md-offset-1">
					<div class="entry-meta">
						<?php coffeehouse_posted_on(); ?>
						<?php coffeehouse_comments_link(); ?>
					</div><!-- .entry-meta -->
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
				</div>
			</div>
		</div><!-- .format-aside -->
<?php } elseif ( has_post_format( 'gallery' )) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header large-layout-single-column">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="single-entry-meta">
				<?php coffeehouse_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content large-layout-single-column">
			<?php if ( has_post_thumbnail() ) { ?>
	    		<div class="photo photo-featured large-layout-single-column">
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'coffeehouse-large');
	    		echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute('echo=0') . '" >'; ?>
	    		<figure><?php the_post_thumbnail('large');?></figure>
	    		<?php echo '</a>'; ?> </div>
			<?php } ?>

			<?php if ( has_post_format( array('image', 'aside', 'gallery') )) { ?>
			<div class="gallery">
			<?php $thumb_ID = get_post_thumbnail_id( $post->ID );
			$attachments = get_children(array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'exclude' => $thumb_ID,
				'post_parent' => $post->ID,
				'post_status' => 'inherit',
				'post_mime_type' => 'image',
				'order' => 'ASC',
				'orderby' => 'menu_order ID'));

			foreach($attachments as $att_id => $attachment) {
				$full_img_url = wp_get_attachment_url($attachment->ID);
					$split_pos = strpos($full_img_url, 'wp-content');
					$split_len = (strlen($full_img_url) - $split_pos);
					$abs_img_url = substr($full_img_url, $split_pos, $split_len);
					$full_info = @getimagesize(ABSPATH.$abs_img_url);
					?>
					<div class="photo">
						<figure class="expand"><a href="<?php echo $full_img_url; ?>" title="<?php echo $attachment->post_title; ?>" target="_blank">
						<?php echo wp_get_attachment_image($attachment->ID, 'large'); ?> </a></figure>
					</div>
			<?php } ?>
			</div><!-- .gallery -->
			<?php } ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer large-layout-single-column sr-only">
			<?php coffeehouse_entry_footer(); ?>
		</footer><!-- .entry-footer -->
<!-- .format-gallery -->
<?php } else { ?>
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


			<?php if ( has_post_format( array('image', 'aside', 'gallery') )) { ?>

		<div class="gallery">

			<?php
			$thumb_ID = get_post_thumbnail_id( $post->ID );
			$attachments = get_children(array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'exclude' => $thumb_ID,
				'post_parent' => $post->ID,
				'post_status' => 'inherit',
				'post_mime_type' => 'image',
				'order' => 'ASC',
				'orderby' => 'menu_order ID'));

			foreach($attachments as $att_id => $attachment) {
				$full_img_url = wp_get_attachment_url($attachment->ID);
					$split_pos = strpos($full_img_url, 'wp-content');
					$split_len = (strlen($full_img_url) - $split_pos);
					$abs_img_url = substr($full_img_url, $split_pos, $split_len);
					$full_info = @getimagesize(ABSPATH.$abs_img_url);
					?>
					<div class="photo">
						<figure class="expand"><a href="<?php echo $full_img_url; ?>" title="<?php echo $attachment->post_title; ?>" target="_blank">
						<?php echo wp_get_attachment_image($attachment->ID, 'large'); ?> </a></figure>
					</div>
			<?php } ?>
		</div><!-- .gallery -->
	<?php } ?>

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
	<?php } ?>
</article><!-- #post-## -->
