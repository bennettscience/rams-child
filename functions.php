<?php
function my_theme_enqueue_styles() {

    $parent_style = 'rams-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function remove_wp_nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node( 'new-user' );
}

add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );

function post_remove() {
    remove_menu_page('edit.php');
}

// add_action('admin_menu', 'post_remove');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function create_post_type() {

    /**
     * Register a custom post type
     *
     * Supplied is a "reasonable" list of defaults
     * @see register_post_type for full list of options for register_post_type
     * @see add_post_type_support for full descriptions of 'supports' options
     * @see get_post_type_capabilities for full list of available fine grained capabilities that are supported
     */
    register_post_type('leadership', array(
        'labels' => array(
            'name' => __('Leadership', 'en'),
            'singular_name' => __('Leadership'),
            'add_new' => __('Add Leader'),
            'add_new_item' => __('Add Leader'),
            'edit_item' => __('Edit Details'),
            'new_item' => __('Add Leader'),
            'view_item' => __('View Leader'),
            'search_items' => __('Search Leadership'),
            'not_found' => __('No Leader found'),
            'not_found_in_trash' => __('No Leaders found in trash')
        ),
        'description' => __('New City Presbyterian Church Leader profile card'),
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'menu_position' => 2,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'page-attributes',
            'custom-fields'
        ),
        'capability_type' => 'post',
        'rewrite' => true,
    ));

    register_post_type('ministries', array(
        'labels' => array(
            'name'           => __('Ministries', 'en'),
            'singular_name'  => __('Ministry'),
            'add_new'        => __('Add Ministry'),
            'add_new_item'   => __('Add Ministry'),
            'edit_item'      => __('Edit Ministry'),
            'new_item'       => __('Add Ministry'),
            'view_item'      => __('View Ministry'),
            'search_items'   => __('Search Ministries'),
            'not_found'      => __('No ministry matched your search')
        ),
        'description'        => __('Ministries and programs at New City Presbyterian Church'),
        'public'             => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'menu_position' => 3,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail',
            'page-attributes',
            'custom-fields'
        ),
        'capability_type' => 'post',
        'rewrite' => true,
    ));
}

add_action('init', 'create_post_type');
?>
