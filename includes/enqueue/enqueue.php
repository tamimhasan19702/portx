<?php


if (!function_exists('portx_enqueue_style')):
    function portx_enqueue_style()
    {
        // theme styles
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');
        wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
        wp_enqueue_style('nouislider', get_template_directory_uri() . '/assets/css/nouislider.css');
        wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css');
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
        wp_enqueue_style('font-awesome-pro', get_template_directory_uri() . '/assets/css/font-awesome-pro.css');
        wp_enqueue_style('spacing', get_template_directory_uri() . '/assets/css/spacing.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');




        // theme scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/vendor/waypoints.js', ['jquery'], null, true);
        wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap-bundle.js', ['jquery'], null, true);
        wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.js', ['jquery'], null, true);
        wp_enqueue_script('nouislider', get_template_directory_uri() . '/assets/js/nouislider.js', ['jquery'], null, true);
        wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', ['jquery'], null, true);
        wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/parallax.js', ['jquery'], null, true);
        wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', ['jquery'], null, true);
        wp_enqueue_script('jarallax', get_template_directory_uri() . '/assets/js/jarallax.js', ['jquery'], null, true);
        wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.js', ['jquery'], null, true);
        wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/counterup.js', ['jquery'], null, true);
        wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', ['jquery'], null, true);
        wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope-pkgd.js', ['jquery'], null, true);
        wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri() . '/assets/js/imagesloaded-pkgd.js', ['jquery'], null, true);
        wp_enqueue_script('ajax-form', get_template_directory_uri() . '/assets/js/ajax-form.js', ['jquery'], null, true);
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);

    }

endif;
add_action('wp_enqueue_scripts', 'portx_enqueue_style');