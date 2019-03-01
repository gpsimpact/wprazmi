<?php

get_header();
?>
	
	<?php 

	$page_for_posts = get_option( 'page_for_posts' );
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'full' );
    $subtitle = get_field('page_subtitle', $page_for_posts);

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

	<header class="blog-header" <?php echo 'style="background-image: url(' . $image[0] . ');"'; ?>>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 d-flex flex-column">
					<h1 class="entry-title my-5">
						<?php single_post_title(); ?>
						<?php if($paged != 1){ echo ': Page ' . $paged; } ?>
					</h1>
				</div>
			</div>
		</div>
	</header>

	<main id="primary" class="container pb-5">
		
		<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) : ?>
            <div class="row justify-content-center">
              
              <?php while( $wp_query->have_posts() ) : the_post(); ?>
                  <div class="col-sm-8">
					          <?php get_template_part('template-parts/content', get_post_type() );  ?>
                  </div>
              <?php endwhile; ?>

            </div>
		    <?php endif; ?>
		
		<?php $args = array( 'show_all' => true,
												 'type'  => 'list',
												 'total' => $wp_query->max_num_pages ); ?>
				<div class="row justify-content-center">
					<div class="col-sm-10">
						<nav class="pagination">
							<?php echo paginate_links( $args ); ?>
						</nav>
					</div>
				</div>
		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php get_footer();