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
