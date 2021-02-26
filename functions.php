<?php // override_function of parent
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'molecule-custom-script', get_stylesheet_directory_uri() . '/assets/js/custom-functions.js', array( 'jquery' ), '20181230', true );
}

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '<a class="readmore-btn" href="'. get_permalink($post->ID) . '">continue reading</a>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );

function remove_some_widgets(){
    unregister_sidebar( 'sidebar-footer-4' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );