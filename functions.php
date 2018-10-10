<?php  
function wpb_widgets_init(){
    register_sidebar(array(
     'name' =>  'Top header',
     'id'   =>  'header_contact',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_widgets_init');

function your_theme_enqueue_scripts() {
    // all styles
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), 20141119 );
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap-theme.css', array(), 20141119 );
    // all scripts
    // wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
    // wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_scripts' );

//Menu Widget
function wpb_menu_init(){
    register_sidebar(array(
     'name' =>  'Top Menu',
     'id'   =>  'header_menu',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_menu_init');

//header image
function wpb_headerimage_init(){
    register_sidebar(array(
     'name' =>  'headerimage',
     'id'   =>  'header_image',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_headerimage_init');


?>