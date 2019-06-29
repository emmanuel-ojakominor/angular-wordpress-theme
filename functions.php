<?php

add_action( 'after_setup_theme', 'awp_theme_setup' );
add_action( 'wp_enqueue_scripts', 'awp_theme_styles' );
add_action( 'wp_enqueue_scripts', 'awp_theme_js' );
add_action( 'wp_head', 'awp_base_href', 99 );
add_action( 'init', 'angular_rewrite', 999, 0 );
add_filter( 'template_redirect', 'angular_remove_redirect', 1, 0);

function awp_theme_setup()
{
    register_nav_menus(
        array(
            'main-menu' => __('Primary', 'angular-wp-theme'),
            'footer' => __('Footer Menu', 'angular-wp-theme'),
        )
    );
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
    add_theme_support(
        'custom-logo',
        array(
            'height' => 190,
            'width' => 190,
            'flex-width' => false,
            'flex-height' => false,
        )
    );
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
}

function awp_theme_styles()
{
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.css' );
    wp_enqueue_style('main_css',get_template_directory_uri() . '/style.css' );
}

function awp_theme_js() {
    wp_enqueue_script( 'bootstrap_js',get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.js', array('jquery'), '',true);
    wp_enqueue_script( 'runtime_js', get_ang_scripts_loc() . '/runtime.js', '', 1.0, true );
    wp_enqueue_script( 'polyfills_js', get_ang_scripts_loc() . '/polyfills.js', '', 1.0, true );
    wp_enqueue_script( 'styles_js', get_ang_scripts_loc() . '/styles.js', '', 1.0, true );
    wp_enqueue_script( 'vendor_js', get_ang_scripts_loc() . '/vendor.js', '', 1.0, true );
    wp_enqueue_script( 'main_js', get_ang_scripts_loc() . '/main.js', '', 1.0, true );

    wp_localize_script('main_js', 'api_settings', array(
        'root'  => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' )
    ));
}

function get_ang_scripts_loc() {
    $ang_scripts_loc = get_template_directory_uri() . '/dist'; // Default script files location, when app is built.
    if (defined('WP_ENV') && 'LOCAL' === WP_ENV) {  // WP_ENV defined in wp-config.php.
        $ang_scripts_loc = '//localhost:4200'; // Local dev. env. only, for more rapid deployment.
    }
    return $ang_scripts_loc;
}

function awp_base_href() {
    if( is_front_page() ) {
        echo '<base href="/">';
    }
}

function angular_rewrite() {
    add_rewrite_rule('posts/([^/]*)/?', 'index.php?pagename=app-page', 'top');
}

function angular_remove_redirect() {
    if ( is_front_page() ) {
        remove_filter( 'template_redirect', 'redirect_canonical' );
    }
}