<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>



    <title>
			<?php if (is_front_page()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); }
	      		elseif (is_home()) { echo 'News | ' . get_bloginfo("name"); }
	      		elseif (is_404()) {  echo 'Content not found... | ' . get_bloginfo("name"); }
	      		else { echo get_the_title() . ' | ' . get_bloginfo("name"); } ?>
    </title>
    

  </head>
	<body <?php body_class(); ?>>
  <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); }?>

<header id="header" role="banner">

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
           'menu_class'      => 'navbar-nav ml-auto',
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
