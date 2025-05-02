<?php


if (!function_exists('portx_setup')):


    function portx_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on portx, use a find and replace
         * to change 'portx' to the name of your theme in all the template files
         */
        load_theme_textdomain('portx', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded  tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        // set_post_thumbnail_size( 825, 510, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'main-menu' => __('Main Menu', 'portx'),
            'footer-menu' => __('Footer Menu', 'portx'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'quote',
            'gallery',
            'audio'
        ));

        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true
        ));

        remove_theme_support('widgets-block-editor');



    }
endif; // portx_setup
add_action('after_setup_theme', 'portx_setup');

// Enable Classic Editor by default
add_filter('use_block_editor_for_post', '__return_false');