<?php
get_header();
?>

	<div class="content">
			<div class="error-404 not-found container">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<header class="entry-header">
							<h1><?php _e( 'Oops! That page can&rsquo;t be found.'); ?></h1>
						</header>
					

						<main id="main">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?'); ?></p>
							<?php get_search_form(); ?>
						</main>
					</div>
				</div>
			</div>

	</div>

<?php
get_footer();
