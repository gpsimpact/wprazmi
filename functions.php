<?php

 if ( ! function_exists( 'razmi_setup')) :

    function razmi_setup() {
        require_once __DIR__ . '/inc/vendor/autoload.php';
        $dotenv = new Dotenv\Dotenv(__DIR__, 'theme.env');
        $dotenv->load();


        load_theme_textdomain( 'razmi', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );

        register_nav_menus(
            array(
                'header-menu' => __('Header Menu', 'razmi'),
                'footer-menu' => __('Footer Menu', 'razmi'),
                'social-menu' => __('Social Menu', 'razmi'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'gallery',
                'caption',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height' => 100,
                'width' => 250,
                'flex-width' => true,
                'flex-height'=> true,
                'header-text'=> array( 'site-title', 'site-description'),
            )
        );

        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('responsive-embeds');

        add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => getenv('primaryColor') ? getenv('primaryColor') : '#666',
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => getenv('secondaryColor') ? getenv('secondaryColor') : '#666',
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
        );
        
        add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

    }
endif;
add_action( 'after_setup_theme', 'razmi_setup');


function razmi_scripts() {	
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-form' );
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-2.2.4.min.js', array(), '2.2.4', false);
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.min.js');
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
	wp_enqueue_style( 'razmi-style', get_stylesheet_uri());

}

add_action( 'wp_enqueue_scripts', 'razmi_scripts');

if( defined( 'WPSEO_VERSION' ) ):
	add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );
endif;


require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/register-blocks.php';