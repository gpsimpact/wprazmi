
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	<header class="entry-header" style="background-image: url('<?php echo $image_full[0]; ?>');">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                  
				</div>
			</div>
        </div>
        
        <?php if( is_singular() && is_child() ):

            bootstrap_breadcrumb();

        endif;?>
                    
		
	</header><!-- .entry-header -->

	<main class="entry-content py-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">

					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theme' ),
							'after'  => '</div>',
						) );
					?>

				</div>
			</div>
		</div>
	</main><!-- .entry-content -->

	<footer class="entry-footer container">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
