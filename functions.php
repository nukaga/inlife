<?php

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_filter( 'excerpt_more', 'portfolio_excerpt_more', 999 );

if(!function_exists('portfolio_custom_excerpt_length')) {
	function portfolio_custom_excerpt_length( $length ) {
		return get_theme_mod('portfolio_excerpt_length', 100);
	}
}