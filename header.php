<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <?php if (has_site_icon()): ?>
        <link rel="shortcut icon" href="<?php echo esc_url(get_site_icon_url()); ?>" type="image/x-icon">
    <?php else: ?>
        <link rel="shortcut icon"
            href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/favicon.png'); ?>"
            type="image/x-icon">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->
    <!-- preloader to start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>
            </div>
        </div>
    </div>


    <?php

    $header_field = function_exists('get_field') ? get_field('header_type') : '';
    $header_type = get_theme_mod('portx_header_type', 'header-1');

    if ($header_type == 'header-1') {
        get_template_part('template-parts/header/header-1');
    } elseif ($header_type == 'header-2') {
        get_template_part('template-parts/header/header-2');
    } else {
        if ($header_field == 'header-1') {
            get_template_part('template-parts/header/header-1');
        } elseif ($header_field == 'header-2') {
            get_template_part('template-parts/header/header-2');
        }
    }



    ?>