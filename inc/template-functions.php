<?php


function theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  if ( is_child() ) {
  	$classes[] = 'child-page';
  }

  if( get_field('has_announcement', 'option' ) ) {
    $classes[] = 'abar';
  }

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

function is_child() {
  global $post;
  if(is_page() && $post->post_parent):
    $return = true;
  else:
    $return = false;
  endif;

  return $return;
}

function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
function theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'theme_pingback_header' );
