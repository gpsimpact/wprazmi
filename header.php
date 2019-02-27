<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>


    <?php if(get_field('favicon','option')):?>
		<link rel="icon" type="image/ico" href="<?php the_field('favicon','option');?>" sizes="16x16" />
		<?php endif;?>
		<?php if(get_field('favicon_16','option')):?>
		<link rel="icon" type="image/png" href="<?php the_field('favicon_16','option');?>" sizes="16x16" />
		<?php endif;?>
		<?php if(get_field('favicon_32','option')):?>
		<link rel="icon" type="image/png" href="<?php the_field('favicon_32','option');?>" sizes="32x32" />
		<?php endif;?>
		<?php if(get_field('favicon_32','option')):?>
		<link rel="icon" type="image/png" href="<?php the_field('favicon_96','option');?>" sizes="96x96" />
		<?php endif;?>


  </head>
	<body <?php body_class(); ?>>
  <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); }?>

<header id="header" role="banner" class="">



    <nav class="navbar navbar-expand-lg navbar-static-top">
    <div class="container">
  
      <a class="navbar-brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
          <span class="sr-only"><?php bloginfo('name'); ?></span>
          <?php if(get_field('nav_logo', 'option')):?>
            <img src="<?php the_field('nav_logo', 'option');?>" alt="<?php bloginfo('name'); ?>" />
          <?php else:?>
            <?php bloginfo('name'); ?>
          <?php endif;?>
      </a>

      <button type="button" id="nav-toggler" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="sr-only">Menu</span><i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse flex-lg-column ml-lg-0 ml-3" id="navbarCollapse">
  

      <?php
          wp_nav_menu([
           'menu'            => 'header-menu',
           'theme_location'  => 'header-menu',
           'container'       => false,
           'menu_id'         => false,
           'menu_class'      => 'navbar-nav flex-lg-row mb-2 ml-auto',
           'depth'           => 2,
           'fallback_cb'     => 'wp_bootstrap4_navwalker::fallback',
           'walker'          => new wp_bootstrap4_navwalker()
         ]);
      ?>
   
      </div>

    </div><!-- /.container -->
  </nav>

</header>

<main id="content" class="site-content">
