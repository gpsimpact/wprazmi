<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header <?php if(is_singular() ): ?> row justify-content-center <?php endif;?> ">
		<?php
            if ( is_singular() ) :
                the_title( '<div class="col-md-10"><h1 class="entry-title">', '</h1></div>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
		 ?>
	</header>

	<main class="entry-content <?php if ( is_singular() ) : ?>row justify-content-center<?php endif; ?>">
        <?php if ( is_singular() ) : ?>
                <div class="col-md-10">
                    <?php theme_post_thumbnail(); ?>
                    <?php the_content( sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'theme' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                    get_the_title()
                    ) );?>
                    <?php 	wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theme' ),
							'after'  => '</div>',
						) );?>
                </div>
            <?php else: ?> 
                <?php the_excerpt();?>
            <?php endif;?>
	</main>

	<footer class="entry-footer">
		
		<div class="row align-items-center justify-content-center">
            <?php if( !is_singular() ): ?>
                    <div class="col-12 mb-3 mb-md-0 col-md-6">
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read more</a>
                    </div>
                    <div class="col-12 col-md-6 text-right">
                        <?php get_template_part('template-parts/social', 'share');?>
                    </div>
            <?php else: ?>

                <div class="col-md-10">
                    <?php get_template_part('template-parts/social', 'share');?>
                </div>
                
            <?php endif;?>
			
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
