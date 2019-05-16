<?php
get_header();
?>

<div class="content">
		<?php while ( have_posts() ) : the_post();?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
							<h1><?php the_title();?></h1>
					</header>

					<main class="entry-content">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-10">

									<?php the_content();?>

								</div>
							</div>
						</div>
					</main>

					<footer class="entry-footer">
					
					</footer>

				</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();
