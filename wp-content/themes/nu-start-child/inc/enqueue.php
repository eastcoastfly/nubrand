<?php
// Front end ONLY
add_action( 'wp_enqueue_scripts', 'nu__enqueue_scripts' );

/**
 * Enqueue frontend and editor JavaScript and CSS
 */
function nu__enqueue_scripts() {

    // deregister default jQuery
    // wp_deregister_script('jquery'); 
    wp_enqueue_script('jquery', get_template_directory_uri().'/__precomp/vendor/js/jquery.min.js', array(), null, true);

    // Enqueue block editor styles
    wp_enqueue_style(
        'child-theme-styles',
		get_stylesheet_directory_uri() . '/dist/style.css',
        ['main','pattern-styles'],
        filemtime( get_stylesheet_directory() . '/includes/build/css/child-theme-styles.css' )	
    );
    
    // register theme main menu nav scripts
    wp_register_script(
        'child-theme-scripts'
        , get_stylesheet_directory_uri() . '/dist/scripts.js'
        , array('main')
    );
    wp_enqueue_script( 'child-theme-scripts' );

    // AOS
    wp_enqueue_style(
        'aos-styles',
		'https://unpkg.com/aos@2.3.1/dist/aos.css',
        [],
        '2.3.1'	
    );

    wp_enqueue_script(
        'aos-scripts'
        , 'https://unpkg.com/aos@2.3.1/dist/aos.js'
        , []
        , '2.3.1'
    );
}


function nu__enqueue_block_assets() {}
function nu__enqueue_block_editor_scripts() {}