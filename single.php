<?php
get_header();
?>

	<div id="primary" class="container py-5">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() ); ?>
		
		<div class="row">
			<?php the_post_navigation(array(
        'prev_text'  => __( '<h5 class="mb-3"><i class="fas fa-chevron-left fa-xs" aria-hidden="true"></i> &nbsp;Previous Post</h5><h3>%title</h3>' ),
        'next_text'  => __( '<h5 class="mb-3">Next Post &nbsp <i class="fas fa-chevron-right fa-xs" aria-hidden="true"></i></h5><h3>%title</h3>' )
      )); ?>
    </div>
<?php 
		endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php get_footer();
