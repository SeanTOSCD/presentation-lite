<?php
/**
 * generic content display
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php presentation_lite_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>
	<?php // show excerpts on search results and main content if options is selected ?>
	<?php if ( is_search() || get_theme_mod( 'presentation_lite_post_content' ) == 'excerpt' ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<div class="entry-content">
			
			<?php 
			// display featured image full
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full', array( 'class' => 'featured-img' ) );
			endif;
			
			the_content( __( 'Read More', 'presentation-lite' ) . ' &rarr;' );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'presentation-lite' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	<?php endif; ?>
</article>
