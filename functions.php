<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Register Plugins
require_once('wp_plugins.php');

// Register Custom
require_once('wp_custom.php');

// Remove admin bar
show_admin_bar(false);

// Remove useless WordPress Scripts
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


// Get menu itens for template
function theme_get_menu_items($menu_name){
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        return wp_get_nav_menu_items($menu->term_id);
    }
}

function theme_menu($menu_name, $depth = 2, $container = 'div', $menu_class = ''){
    wp_nav_menu( array(
        'theme_location'    => $menu_name,
        'depth'             => $depth,
        'container'         => $container,
        'container_id'      => $menu_name,
        'menu_class'        => $menu_class,
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
    );
}

function theme_classic_menu($menu_name){
    wp_nav_menu( array(
        'theme_location'    => $menu_name,
        'depth'             => 2,
        'container'         => 'div',
        'container_id'      => $menu_name,
        )
    );
}

// Register menu
register_nav_menus( array(
	'main_menu' => 'Menu',
) );


/* if you need a sidebar, just uncomment this code
// Sidebar
register_sidebar(array(
   'name' => "Footer 1",
   'id' => 'footer-1-widget',
   'description' => '',
   'before_widget' => '<div id="%1$s" class="footer-widget">',
   'after_widget' => '</div>',
   'before_title' => '<h4>',
   'after_title' => '</h4>',
)); 
*/ 

// Include styles
function theme_enqueue_styles(){
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false);
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', false);
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false);    
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

// Include footer styles
function theme_enqueue_footer_styles(){
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/scss/vendors/owl.carousel.min.css', false);
}
add_action( 'get_footer', 'theme_enqueue_footer_styles');

// Include scripts
function theme_enqueue_scripts() {
   wp_enqueue_script( 'jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array('jquery'), '1.11.3', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );;
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );  
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
