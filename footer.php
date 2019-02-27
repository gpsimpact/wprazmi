<footer id="footer" class="footer">
	<section class="info">
		<div class="container">

			<nav class="navbar text-center">
		
			<?php
          wp_nav_menu([
           'menu'            => 'header-menu',
           'theme_location'  => 'header-menu',
           'container'       => false,
           'menu_id'         => false,
           'menu_class'      => 'navbar-nav  mx-auto ',
           'depth'           => 2,
           'fallback_cb'     => 'wp_bootstrap4_navwalker::fallback',
           'walker'          => new wp_bootstrap4_navwalker()
         ]);
      ?>
			</nav>

			<?php if(get_field('footer_logo', 'option')): ?>

				<img src="<?php the_field('footer_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo hidden-sm hidden-xs" /></a>

			<?php endif; ?>

			<?php if(get_field('disclaimer', 'option')):?>
				<p class="disclaimer"> <?php the_field('disclaimer', 'option');?></p>
			<?php endif;?>
		</div>
	</section>
</footer>