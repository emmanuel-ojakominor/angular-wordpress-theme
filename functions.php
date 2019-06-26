<?php

add_action('wp_enqueue_scripts', 'awp_theme_styles');
add_action('wp_enqueue_scripts', 'awp_theme_js');
add_action('wp_head', 'awp_base_href', 99);

function awp_theme_styles()
{
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.css' );
    wp_enqueue_style('main_css',get_template_directory_uri() . '/style.css' );
}

function awp_theme_js() {
    wp_enqueue_script( 'bootstrap_js',get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.js','', '',true);
    wp_enqueue_script( 'runtime_js', get_ang_scripts_loc() . '/runtime.js', '', 1.0, true );
    wp_enqueue_script( 'polyfills_js', get_ang_scripts_loc() . '/polyfills.js', '', 1.0, true );
    wp_enqueue_script( 'styles_js', get_ang_scripts_loc() . '/styles.js', '', 1.0, true );
    wp_enqueue_script( 'vendor_js', get_ang_scripts_loc() . '/vendor.js', '', 1.0, true );
    wp_enqueue_script( 'main_js', get_ang_scripts_loc() . '/main.js', '', 1.0, true );
}

function get_ang_scripts_loc() {
    $ang_scripts_loc = get_template_directory_uri() . '/dist'; // Default script files location, when app is built.
    if (defined('WP_ENV') && 'LOCAL' === WP_ENV) {  // WP_ENV defined in wp-config.php.
        $ang_scripts_loc = '//localhost:4200'; // Local dev. env. only, for more rapid deployment.
    }
    return $ang_scripts_loc;
}

function awp_base_href() {
    if(is_front_page()) {
        echo '<base href="/">';
    }
}