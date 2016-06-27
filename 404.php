<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'presentation-lite' ); ?></h2>
				</header>

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Try using the search form below.', 'presentation-lite' ); ?></p>

					<?php get_search_form(); ?>
				</div>
			</section>

		</main>
	</div>

<?php get_footer(); ?>