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

    }
endif;
add_action( 'after_setup_theme', 'razmi_setup');


function razmi_scripts() {
    wp_enqueue_style( 'razmi-style', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'razmi_scripts');

require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';