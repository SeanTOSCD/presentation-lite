<?php
/**
 * The template used for displaying single post content in single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php presentation_lite_posted_on(); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php
			// display featured image?
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full', array( 'class' => 'featured-img' ) );
			endif; 
			the_content(); 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'presentation_lite' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer class="entry-meta">
		<?php
		$category_list = get_the_category_list( __( ', ', 'presentation_lite' ) );
		$tag_list = get_the_tag_list( '', __( ', ', 'presentation_lite' ) );

		if ( ! presentation_lite_categorized_blog() ) :
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) :
			?>
				<span class="tags-links tax-links">
					<i class="fa fa-tags"></i><?php echo $tag_list; ?>
				</span>
			<?php
			endif;
		else : 
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) :
			?>
				<span class="cat-links tax-links">
					<i class="fa fa-archive"></i><?php echo $category_list; ?>
				</span><br>
				<span class="tags-links tax-links">
					<i class="fa fa-tags"></i><?php echo $tag_list; ?>
				</span>
			<?php
			else :
			?>
				<span class="cat-links tax-links">
					<i class="fa fa-archive"></i><?php echo $category_list; ?>
				</span>
			<?php
			endif;
		endif;
		?>
	</footer>
</article>

<?php // show post footer? theme customizer options ?>
<?php if ( get_theme_mod( 'presentation_lite_post_footer' ) == 1 && ! has_post_format( 'aside' ) ) : ?>
	<div class="single-post-footer clear">
		<div class="post-footer-author">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', get_the_author_meta( 'display_name' ) ); ?>
			<h5 class="author-name"><?php echo __( 'written by ', 'presentation_lite' ) . get_the_author_meta( 'display_name' ); ?></h5>
			<?php do_action( 'presentation_social_profiles' ); ?>
		</div>
		<?php if ( ! get_the_author_meta( 'description' ) == '' ) : ?>
			<div class="post-footer-author-bio">
				<p><?php echo get_the_author_meta( 'description' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>