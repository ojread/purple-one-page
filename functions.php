<?php

include('inc/meta-boxes.php');
include('inc/wp-bootstrap-navwalker.php');

/*
Useful plugins that I could use:
Simple custom post order
Meta box
Redux framework
*/

function pop_setup_theme() {
    // Add theme supports.
	add_theme_support('custom-header', array(
		// You have to specify both height and width or neither.
        //'height' => 50,
		//'width' => 0
    ));
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
}
add_action('init', 'pop_setup_theme');




register_nav_menus( array(
    'main-menu' => __( 'Main Menu', 'pop' ),
) );


// Enqueue theme CSS and JS.
add_action('wp_enqueue_scripts', 'pop_enqueue_scripts');
function pop_enqueue_scripts() {
    wp_register_style('bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-style');

    wp_register_script('bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap-script');

	wp_register_script('caroufredsel-script', get_template_directory_uri() . '/js/lib/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), false, true);
    wp_enqueue_script('caroufredsel-script');

    wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:700,400');
    wp_enqueue_style('google-fonts');

    wp_register_style('pop-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('pop-style');

    wp_register_script('pop-script', get_template_directory_uri() . '/js/main.js', array('bootstrap-script', 'jquery'), false, true);
    wp_enqueue_script('pop-script');
}





function pop_get_child_pages($parent_id) {
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $parent_id,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    return new WP_Query($args);
}




function pop_get_section_bg_style($page_id) {
    // Check the custom options set for the page and set the background styles.
    $styles = '';

    // Background image.
    /*$bg_image_id = rwmb_meta('rw_background_image', array(), $page_id);
    if ($bg_image_id) {
        $bg_image_url = wp_get_attachment_url($bg_image_id);
        $styles .= "background-image: url($bg_image_url); ";
    }*/

    // Background colour.
    $bg_color = rwmb_meta('rw_background_color', array(), $page_id);
    if ($bg_color) {
        $styles .= "background-color: $bg_color; ";
    }

    return $styles;
}

function pop_get_section_style($page_id) {
    // Check the custom options set for the page and set the section styles.
    $styles = '';

    // Foreground colour.
    $fg_color = rwmb_meta('rw_foreground_color', array(), $page_id);
    if ($fg_color) {
        $styles .= "color: $fg_color; ";
    }

    return $styles;
}

function pop_get_section_class($page_id) {
    // Check the custom options set for the page and set the section styles.
    $classes = array('section');

    // Full screen section.
    $full_screen_section = rwmb_meta('rw_full_screen_section', array(), $page_id);
	//echo '<p>VAR: ', $full_height, '</p>';
    if ($full_screen_section == 1) {
        $classes[] = 'full-screen';
    }

	// Create string of space separated classes.
    return implode(' ', $classes);
}
