<?php



class Portx_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"tp-submenu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Get ACF toggle field
        $show_demo_menu = get_field('show_demo_menu', $item->ID);

        // Set up <li> class
        $classes = array();
        if (in_array('menu-item-has-children', $item->classes) || $show_demo_menu) {
            $classes[] = 'has-dropdown';
        }
        $class_names = $classes ? ' class="' . esc_attr(join(' ', $classes)) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        // Link attributes
        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Title & link
        $title = apply_filters('the_title', $item->title, $item->ID);
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // If show_demo_menu is checked, show Kirki repeater layout
        if ($show_demo_menu) {
            $demo_menu = get_theme_mod('portx_demo_menu');

            if (!empty($demo_menu)) {
                $item_output .= '<div class="tp-submenu submenu has-homemenu">';
                $item_output .= '<div class="row gx-6 row-cols-1 row-cols-md-2 row-cols-xl-3">';

                foreach ($demo_menu as $demo) {
                    $image = isset($demo['image']) ? esc_url($demo['image']) : '';
                    $link = isset($demo['link']) ? esc_url($demo['link']) : '#';
                    $header = isset($demo['header']) ? esc_html($demo['header']) : '';
                    $button_text = isset($demo['button_text']) ? esc_html($demo['button_text']) : '';

                    $item_output .= '
                        <div class="col homemenu">
                            <div class="homemenu-thumb mb-15">
                                <img src="' . $image . '" alt="">
                                <div class="homemenu-btn">
                                    <a class="tp-menu-btn" href="' . $link . '">' . $button_text . '</a>
                                </div>
                            </div>
                            <div class="homemenu-content text-center">
                                <h4 class="homemenu-title">
                                    <a href="' . $link . '">' . $header . '</a>
                                </h4>
                            </div>
                        </div>';
                }

                $item_output .= '</div></div>';
            }
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}