<?php 
  // 1. Customize ACF path
  function gps_acf_settings_path( $path ) {
	$path = get_stylesheet_directory() . '/inc/acf/';
	return $path;
  }
  add_filter('acf/settings/path', 'gps_acf_settings_path');
  
  
  // 2. Customize ACF dir
  function gps_acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/inc/acf/';
	return $dir;
  }
  add_filter('acf/settings/dir', 'gps_acf_settings_dir');
  
  // 3. Include ACF
  include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
  
  // 5. Local JSON Save/Load
  function gps_acf_json_save_point( $path ) {
	$path = get_stylesheet_directory() . '/inc/acf-json';
	return $path;
  }
  add_filter('acf/settings/save_json', 'gps_acf_json_save_point');
  
  function gps_acf_json_load_point( $paths ) {
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/inc/acf-json';
	return $paths;
  }
  add_filter('acf/settings/load_json', 'gps_acf_json_load_point');
  
  if( function_exists('acf_add_options_page') ) {
  
	acf_add_options_page(array(
	  'page_title'  => 'Theme Settings',
	  'menu_title'  => 'Theme Settings',
	  'menu_slug'   => 'general-site-settings',
	  'capability'  => 'edit_posts',
	  'redirect'    => false,
	  'icon_url'    => 'dashicons-admin-site',
	  'position'    => 3.1,
	));
  
  }