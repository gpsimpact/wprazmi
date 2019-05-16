
<?php 

function register_acf_block_types() {

    $registerBlocks = array(
        include('blocks/hero.php'),
        include('blocks/hero2.php')
    );
    foreach ($registerBlocks as $block){
        acf_register_block_type(
            $block
        );
    }
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


