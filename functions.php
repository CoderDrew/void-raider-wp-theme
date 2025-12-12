<?php
/**
 * Void Raider Theme Functions
 *
 * @package VoidRaider
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function voidraider_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'assets/css/global.css' );

    // Add support for HTML5 markup.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action( 'after_setup_theme', 'voidraider_setup' );

/**
 * Enqueue scripts and styles.
 */
function voidraider_scripts() {
    // Enqueue global styles
    wp_enqueue_style(
        'voidraider-global',
        get_template_directory_uri() . '/assets/css/global.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // Add inline script for dark mode toggle (if needed)
    wp_add_inline_script(
        'voidraider-scripts',
        "
        // Dark mode toggle functionality
        const toggleDarkMode = () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        };

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
        "
    );
}
add_action( 'wp_enqueue_scripts', 'voidraider_scripts' );

/**
 * Register block patterns category.
 */
function voidraider_register_block_patterns_category() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'voidraider',
            array( 'label' => __( 'Void Raider', 'voidraider' ) )
        );
    }
}
add_action( 'init', 'voidraider_register_block_patterns_category' );

/**
 * Add custom block styles.
 */
function voidraider_register_block_styles() {
    // Add custom button style
    register_block_style(
        'core/button',
        array(
            'name'  => 'cyberpunk',
            'label' => __( 'Cyberpunk', 'voidraider' ),
        )
    );

    // Add custom heading style
    register_block_style(
        'core/heading',
        array(
            'name'  => 'glitch',
            'label' => __( 'Glitch Effect', 'voidraider' ),
        )
    );
}
add_action( 'init', 'voidraider_register_block_styles' );

/**
 * Customize the excerpt length.
 */
function voidraider_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'voidraider_excerpt_length' );

/**
 * Customize the excerpt "more" string.
 */
function voidraider_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'voidraider_excerpt_more' );

/**
 * Register custom post type: Runs
 */
function voidraider_register_runs_post_type() {
    $labels = array(
        'name'                  => _x( 'Runs', 'Post type general name', 'voidraider' ),
        'singular_name'         => _x( 'Run', 'Post type singular name', 'voidraider' ),
        'menu_name'             => _x( 'Runs', 'Admin Menu text', 'voidraider' ),
        'name_admin_bar'        => _x( 'Run', 'Add New on Toolbar', 'voidraider' ),
        'add_new'               => __( 'Add New', 'voidraider' ),
        'add_new_item'          => __( 'Add New Run', 'voidraider' ),
        'new_item'              => __( 'New Run', 'voidraider' ),
        'edit_item'             => __( 'Edit Run', 'voidraider' ),
        'view_item'             => __( 'View Run', 'voidraider' ),
        'all_items'             => __( 'All Runs', 'voidraider' ),
        'search_items'          => __( 'Search Runs', 'voidraider' ),
        'parent_item_colon'     => __( 'Parent Runs:', 'voidraider' ),
        'not_found'             => __( 'No runs found.', 'voidraider' ),
        'not_found_in_trash'    => __( 'No runs found in Trash.', 'voidraider' ),
        'featured_image'        => _x( 'Run Cover Image', 'Overrides the "Featured Image" phrase', 'voidraider' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase', 'voidraider' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase', 'voidraider' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase', 'voidraider' ),
        'archives'              => _x( 'Run archives', 'The post type archive label used in nav menus', 'voidraider' ),
        'insert_into_item'      => _x( 'Insert into run', 'Overrides the "Insert into post" phrase', 'voidraider' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this run', 'Overrides the "Uploaded to this post" phrase', 'voidraider' ),
        'filter_items_list'     => _x( 'Filter runs list', 'Screen reader text for the filter links', 'voidraider' ),
        'items_list_navigation' => _x( 'Runs list navigation', 'Screen reader text for the pagination', 'voidraider' ),
        'items_list'            => _x( 'Runs list', 'Screen reader text for the items list', 'voidraider' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'runs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-games',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'run', $args );
}
add_action( 'init', 'voidraider_register_runs_post_type' );
