<?php
function my_styles() {
wp_enqueue_style( 'style-themes', get_stylesheet_uri() );
    wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
    wp_enqueue_style( 'font-style');


   // wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );

   // wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true  );
}

add_action( 'wp_enqueue_scripts', 'my_styles' );
function enqueue_scripts () {
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
