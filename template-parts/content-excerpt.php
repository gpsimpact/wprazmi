
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>">
			<?php the_title(); ?></a>
		</h2>
		<?php if(has_post_thumbnail()): ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('large', array('class' => 'aligncenter')); ?>
			</a>
		<?php endif; ?>
	</header>



	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php get_template_part('template-parts/social', 'share');?>
	</footer>
</article>
