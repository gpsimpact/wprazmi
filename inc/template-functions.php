<?php 

function add_body_classes( $classes ) {
    if ( is_singular() ){
        $classes[] = 'singular';
    }

    return $classes;
}

add_filter( 'body_class', 'add_body_classes');