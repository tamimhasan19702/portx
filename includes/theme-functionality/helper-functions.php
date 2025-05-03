<?php


function portx_kses($content = '')
{
    $allowed_html = [

        'span' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'a' => [
            'class' => [],
            'id' => [],
            'href' => [],
            'style' => [],
            'target' => [],
            'rel' => [],
        ],
        'br' => [
        ],
        'p' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h1' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h2' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h3' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h4' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h5' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h6' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'img' => [
            'src' => [],
            'alt' => [],
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ul' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'li' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ol' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'blockquote' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'pre' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'code' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'table' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'tr' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'td' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'th' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dl' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dt' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dd' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'video' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'autoplay' => [],
            'controls' => [],
            'loop' => [],
            'muted' => [],
            'playsinline' => [],
            'preload' => [],
            'src' => [],
            'poster' => [],
            'width' => [],
            'height' => [],
        ],
        'source' => [
            'src' => [],
            'type' => [],
            'media' => [],
            'sizes' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'b' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'em' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'div' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'button' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'input' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'type' => [],
            'name' => [],
            'value' => [],
            'placeholder' => [],
        ],
        'textarea' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
            'placeholder' => [],
        ],
        'select' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
        ],
        'option' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'value' => [],
        ],
        'svg' => [
            'xmlns' => [],
            'fill' => [],
            'viewbox' => [],
            'role' => [],
            'aria-hidden' => [],
            'focusable' => [],
            'height' => [],
            'width' => [],
        ],
        'path' => [
            'd' => [],
            'fill' => [],
        ],
        'iframe' => [
            'src' => [],
            'width' => [],
            'height' => [],
            'frameborder' => [],
            'allowfullscreen' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],

        ],
    ];

    return wp_kses($content, $allowed_html);
}
add_action('after_setup_theme', 'portx_setup');


function portx_header_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => 'nav',
        'container_class' => 'tp-main-menu-content',
        'items_wrap' => '<ul>%3$s</ul>',
        'walker' => new Portx_Walker_Nav_Menu(),
    ));
}


function portx_bottom_footer_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'bottom-footer-menu',
        'container' => 'div',
        'container_class' => 'tp-footer__menu text-md-end text-center',
        'items_wrap' => '<ul>%3$s</ul>',
    ));
}

function register_widgets()
{
    register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'footer-widget-1',
        'before_widget' => '<div class="tp-footer__widget tp-footer-col-1 mb-40 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="tp-footer__widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'footer-widget-2',
        'before_widget' => '<div class="tp-footer__widget tp-footer-col-2 mb-40 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".5s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="tp-footer__widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'footer-widget-3',
        'before_widget' => '<div class="tp-footer__widget tp-footer-col-3 mb-40 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".7s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="tp-footer__widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 4',
        'id' => 'footer-widget-4',
        'before_widget' => '<div class="tp-footer__widget tp-footer-col-4 mb-40 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".9s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="tp-footer__widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'blog sidebar 1',
        'id' => 'blog-sidebar-1',
        'before_widget' => '<div class="sidebar__widget mb-40">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sidebar__widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'register_widgets');


function portx_pagination($query = null)
{
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    // Get the current page and total number of pages
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $total_pages = $query->max_num_pages;

    // Only show pagination if there are multiple pages
    if ($total_pages > 1) {
        $pagination = paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $total_pages,
            'type' => 'array',
            'prev_text' => '',
            'next_text' => '<i class="fa-sharp fa-solid fa-arrow-right"></i>',
            'show_all' => false, // Avoid showing all pages (prevents dots)
            'mid_size' => 1,     // Show only 1 page on each side of the current page
            'end_size' => 1,     // Show 1 page at the start and end
        ));

        // Render pagination links in the desired structure
        if ($pagination) {
            echo '<div class="tp-pagination">';
            echo '<nav>';
            echo '<ul>';

            foreach ($pagination as $page) {
                // Skip dots or any non-numeric/non-icon items
                if (strpos($page, 'dots') !== false || strpos($page, '...') !== false) {
                    continue;
                }

                // Handle the current page
                if (strpos($page, 'current') !== false) {
                    preg_match('/<span[^>]*>([^<]*)<\/span>/', $page, $matches);
                    $page_number = !empty($matches[1]) ? $matches[1] : '';
                    if (is_numeric($page_number)) { // Only render if it's a number
                        echo '<li><span class="current">' . esc_html($page_number) . '</span></li>';
                    }
                }
                // Handle page links
                elseif (strpos($page, 'href') !== false) {
                    preg_match('/<a[^>]*href=["\'](.*?)["\'][^>]*>([^<]*)<\/a>/', $page, $matches);
                    $url = !empty($matches[1]) ? $matches[1] : '#';
                    $page_number = !empty($matches[2]) ? $matches[2] : '';
                    // Check if it's a number or the next icon
                    if (is_numeric($page_number)) {
                        echo '<li><a href="' . esc_url($url) . '">' . esc_html($page_number) . '</a></li>';
                    } elseif (strpos($page, 'fa-arrow-right') !== false) {
                        echo '<li><a href="' . esc_url($url) . '"><i class="fa-sharp fa-solid fa-arrow-right"></i></a></li>';
                    }
                }
            }

            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        }
    }
}