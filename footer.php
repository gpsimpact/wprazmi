</main>
<footer id="footer" class="footer">
	<section class="info">
		<div class="container">

		<?php if(has_nav_menu('footer-menu')):?>
			<?php
					wp_nav_menu([
					'menu'            => 'footer-menu',
					'theme_location'  => 'footer-menu',
					'container'       => false,
					'menu_id'         => false,
					'menu_class'      => 'footer-nav nav justify-content-center',
					'depth'           => 2,
					'fallback_cb'     => 'wp_bootstrap4_navwalker::fallback',
					'walker'          => new wp_bootstrap4_navwalker()
					]);
				?>
		  <?php endif;?>
		  
		<?php if(has_nav_menu('social-menu')):?>
				<?php
					wp_nav_menu([
					'menu'            => 'social-menu',
					'theme_location'  => 'social-menu',
					'container'       => false,
					'menu_id'         => false,
					'menu_class'      => 'social-nav nav justify-content-center',
					'depth'           => 2,
					'fallback_cb'     => 'wp_bootstrap4_navwalker::fallback',
					'walker'          => new wp_bootstrap4_navwalker()
					]);
				?>
		<?php endif;?>

			<?php if(get_field('footer_logo', 'option')): ?>

				<img src="<?php the_field('footer_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo hidden-sm hidden-xs" /></a>

			<?php endif; ?>

			<?php if(get_field('disclaimer', 'option')):?>
				<p class="disclaimer"> <?php the_field('disclaimer', 'option');?></p>
			<?php endif;?>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>
