<?php
/**
 * Plugin Name: Pctheme Blocks
 * Description: Custom Gutenberg blocks with Tailwind CSS
 * Version: 1.0.0
 * Author: Palash Chandra
 */

if (!defined('ABSPATH')) exit;

// Include settings and custom CSS
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/custom-css.php';

// Register blocks on init
function pctheme_blocks_register() {
    // Register hero block
    if (file_exists(__DIR__ . '/blocks/hero/block.json')) {
        register_block_type(__DIR__ . '/blocks/hero');
    }
    
    // Register feature grid block
    if (file_exists(__DIR__ . '/blocks/feature-grid/block.json')) {
        register_block_type(__DIR__ . '/blocks/feature-grid');
    }
    
    // Register card block
    if (file_exists(__DIR__ . '/blocks/card/block.json')) {
        register_block_type(__DIR__ . '/blocks/card');
    }
    
    // Register pricing block
    if (file_exists(__DIR__ . '/blocks/pricing/block.json')) {
        register_block_type(__DIR__ . '/blocks/pricing');
    }
    
    // Register testimonial block
    if (file_exists(__DIR__ . '/blocks/testimonial/block.json')) {
        register_block_type(__DIR__ . '/blocks/testimonial');
    }
    
    // Register cta block
    if (file_exists(__DIR__ . '/blocks/cta/block.json')) {
        register_block_type(__DIR__ . '/blocks/cta');
    }
}
add_action('init', 'pctheme_blocks_register');

// Enqueue block editor scripts
function pctheme_blocks_enqueue() {
    wp_enqueue_script(
        'pctheme-blocks-js',
        plugin_dir_url(__FILE__) . 'build/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-block-editor'),
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js')
    );
}
add_action('enqueue_block_editor_assets', 'pctheme_blocks_enqueue');

// Enqueue Tailwind CSS and Swiper in editor
function pctheme_blocks_editor_styles() {
    // Load theme's Tailwind CSS
    $theme_css = get_template_directory() . '/dist/main.css';
    if (file_exists($theme_css)) {
        wp_enqueue_style(
            'pctheme-blocks-tailwind',
            get_template_directory_uri() . '/dist/main.css',
            array(),
            filemtime($theme_css)
        );
    } else {
        wp_enqueue_style(
            'pctheme-blocks-tailwind',
            'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css',
            array(),
            '3.4.1'
        );
    }
    
    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );
}
add_action('enqueue_block_editor_assets', 'pctheme_blocks_editor_styles');

// Enqueue Swiper for frontend
function pctheme_blocks_frontend_assets() {
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );
    
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'pctheme_blocks_frontend_assets');

// Add custom block category
function pctheme_blocks_category($categories) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'pctheme',
                'title' => 'Pctheme Blocks',
            ),
        )
    );
}
add_filter('block_categories_all', 'pctheme_blocks_category', 10, 2);

// Add settings link on plugins page
function pctheme_blocks_settings_link($links) {
    $settings_link = '<a href="admin.php?page=pctheme-blocks-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'pctheme_blocks_settings_link');