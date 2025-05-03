<?php
// Register the custom widget
function register_contact_info_widget()
{
    register_widget('Contact_Info_Widget');
    register_widget('Navigation_Widget');
    register_widget('Portx_Social_Media_Widget');
    register_widget('Portx_Instagram_Gallery_Widget');
}
add_action('widgets_init', 'register_contact_info_widget');


// Custom Contact Info Widget Class
class Contact_Info_Widget extends WP_Widget
{

    /**
     * Constructor to set up the widget.
     */
    public function __construct()
    {
        parent::__construct(
            'contact_info_widget',
            __('Portx Contact Info Widget', 'portx'),
            array(
                'description' => __('Displays contact information with a repeater for phone, email, and address.', 'portx'),
            )
        );
    }

    /**
     * Frontend display of the widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Get contact entries, default to empty array if not set
        $contacts = !empty($instance['contacts']) ? json_decode($instance['contacts'], true) : array();

        // Output HTML structure
        ?>
        <div class="tp-footer__contact-info tp-footer__icon-space">
            <ul>
                <?php
                if (!empty($contacts) && is_array($contacts)) {
                    foreach ($contacts as $contact) {
                        $icon = esc_attr($contact['icon']);
                        $type = esc_attr($contact['type']);
                        $value = esc_html($contact['value']);
                        $link = esc_url($contact['link']);

                        // Determine link type
                        $href = '';
                        if ($type === 'phone') {
                            $href = 'tel:' . str_replace(' ', '', $value);
                        } elseif ($type === 'email') {
                            $href = 'mailto:' . $value;
                        } elseif ($type === 'address') {
                            $href = $link;
                        }

                        ?>
                        <li>
                            <span>
                                <i class="<?php echo $icon; ?>"></i>
                            </span>
                            <a href="<?php echo $href; ?>" <?php echo $type === 'address' ? 'target="_blank"' : ''; ?>>
                                <?php echo $value; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Backend form for widget settings.
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
        // Get existing contacts or set default
        $contacts = !empty($instance['contacts']) ? json_decode($instance['contacts'], true) : array();
        if (!is_array($contacts)) {
            $contacts = array();
        }

        // Hidden field to store contacts as JSON
        ?>
        <p>
            <input type="hidden" id="<?php echo esc_attr($this->get_field_id('contacts')); ?>"
                name="<?php echo esc_attr($this->get_field_name('contacts')); ?>"
                value="<?php echo esc_attr(json_encode($contacts)); ?>" class="contact-info-contacts" />
        </p>

        <!-- Repeater Container -->
        <div class="contact-info-repeater">
            <h4><?php _e('Contact Entries', 'portx'); ?></h4>
            <div class="repeater-items">
                <?php
                if (!empty($contacts)) {
                    foreach ($contacts as $index => $contact) {
                        ?>
                        <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                            <p>
                                <label><?php _e('Type', 'portx'); ?></label><br>
                                <select class="contact-type" style="width: 100%;">
                                    <option value="phone" <?php selected($contact['type'], 'phone'); ?>>
                                        <?php _e('Phone', 'portx'); ?>
                                    </option>
                                    <option value="email" <?php selected($contact['type'], 'email'); ?>>
                                        <?php _e('Email', 'portx'); ?>
                                    </option>
                                    <option value="address" <?php selected($contact['type'], 'address'); ?>>
                                        <?php _e('Address', 'portx'); ?>
                                    </option>
                                </select>
                            </p>
                            <p>
                                <label><?php _e('Icon Class', 'portx'); ?></label><br>
                                <input type="text" class="widefat contact-icon" value="<?php echo esc_attr($contact['icon']); ?>"
                                    placeholder="e.g., fa-solid fa-square-phone" />
                            </p>
                            <p>
                                <label><?php _e('Value', 'portx'); ?></label><br>
                                <input type="text" class="widefat contact-value" value="<?php echo esc_attr($contact['value']); ?>"
                                    placeholder="e.g., +92 487 (9098) 98765" />
                            </p>
                            <p>
                                <label><?php _e('Link (for Address)', 'portx'); ?></label><br>
                                <input type="url" class="widefat contact-link" value="<?php echo esc_attr($contact['link']); ?>"
                                    placeholder="e.g., https://www.google.com/maps/..." />
                            </p>
                            <p>
                                <button type="button" class="button remove-item"><?php _e('Remove', 'portx'); ?></button>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <p>
                <button type="button" class="button add-item"><?php _e('Add Contact', 'portx'); ?></button>
            </p>
        </div>

        <!-- Template for new repeater items -->
        <script type="text/template" id="contact-info-repeater-template">
            <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                                                                                                                        <p>
                                                                                                                            <label><?php _e('Type', 'portx'); ?></label><br>
                                                                                                                            <select class="contact-type" style="width: 100%;">
                                                                                                                                <option value="phone"><?php _e('Phone', 'portx'); ?></option>
                                                                                                                                <option value="email"><?php _e('Email', 'portx'); ?></option>
                                                                                                                                <option value="address"><?php _e('Address', 'portx'); ?></option>
                                                                                                                            </select>
                                                                                                                        </p>
                                                                                                                        <p>
                                                                                                                            <label><?php _e('Icon Class', 'portx'); ?></label><br>
                                                                                                                            <input 
                                                                                                                                type="text" 
                                                                                                                                class="widefat contact-icon" 
                                                                                                                                placeholder="e.g., fa-solid fa-square-phone"
                                                                                                                            />
                                                                                                                        </p>
                                                                                                                        <p>
                                                                                                                            <label><?php _e('Value', 'portx'); ?></label><br>
                                                                                                                            <input 
                                                                                                                                type="text" 
                                                                                                                                class="widefat contact-value" 
                                                                                                                                placeholder="e.g., +92 487 (9098) 98765"
                                                                                                                            />
                                                                                                                        </p>
                                                                                                                        <p>
                                                                                                                            <label><?php _e('Link (for Address)', 'portx'); ?></label><br>
                                                                                                                            <input 
                                                                                                                                type="url" 
                                                                                                                                class="widefat contact-link" 
                                                                                                                                placeholder="e.g., https://www.google.com/maps/..."
                                                                                                                            />
                                                                                                                        </p>
                                                                                                                        <p>
                                                                                                                            <button type="button" class="button remove-item"><?php _e('Remove', 'portx'); ?></button>
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </script>

        <!-- JavaScript for Repeater Functionality -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // Add new item
                $('.contact-info-repeater').on('click', '.add-item', function (e) {
                    e.preventDefault();
                    var template = $('#contact-info-repeater-template').html();
                    $(this).closest('.contact-info-repeater').find('.repeater-items').append(template);
                    updateContacts();
                });

                // Remove item
                $('.contact-info-repeater').on('click', '.remove-item', function (e) {
                    e.preventDefault();
                    $(this).closest('.repeater-item').remove();
                    updateContacts();
                });

                // Update hidden field on change
                $('.contact-info-repeater').on('change input',
                    '.contact-type, .contact-icon, .contact-value, .contact-link',
                    function () {
                        updateContacts();
                    });

                // Function to update hidden field with JSON
                function updateContacts() {
                    var contacts = [];
                    $('.contact-info-repeater .repeater-item').each(function () {
                        var $item = $(this);
                        contacts.push({
                            type: $item.find('.contact-type').val(),
                            icon: $item.find('.contact-icon').val(),
                            value: $item.find('.contact-value').val(),
                            link: $item.find('.contact-link').val()
                        });
                    });
                    $('.contact-info-contacts').val(JSON.stringify(contacts));
                }
            });
        </script>
        <?php
    }

    /**
     * Sanitize and update widget settings.
     *
     * @param array $new_instance New settings.
     * @param array $old_instance Old settings.
     * @return array Updated settings.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        // Sanitize and validate JSON input
        $contacts = !empty($new_instance['contacts']) ? $new_instance['contacts'] : '';
        if ($contacts) {
            $decoded = json_decode($contacts, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Sanitize each contact entry
                $sanitized_contacts = array();
                foreach ($decoded as $contact) {
                    $sanitized_contacts[] = array(
                        'type' => sanitize_text_field(isset($contact['type']) ? $contact['type'] : ''),
                        'icon' => sanitize_text_field(isset($contact['icon']) ? $contact['icon'] : ''),
                        'value' => sanitize_text_field(isset($contact['value']) ? $contact['value'] : ''),
                        'link' => esc_url_raw(isset($contact['link']) ? $contact['link'] : ''),
                    );
                }
                $instance['contacts'] = wp_json_encode($sanitized_contacts);
            } else {
                $instance['contacts'] = $old_instance['contacts']; // Revert to old if invalid
            }
        } else {
            $instance['contacts'] = ''; // Clear if empty
        }

        return $instance;
    }
}

// Enqueue jQuery (already included in WordPress admin)



function contact_info_widget_scripts()
{
    if (is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('admin_enqueue_scripts', 'contact_info_widget_scripts');








class Navigation_Widget extends WP_Widget
{

    /**
     * Constructor to set up the widget.
     */
    public function __construct()
    {
        parent::__construct(
            'portx_navigation_widget', // Fixed ID: lowercase, no spaces
            __('Portx Navigation Widget', 'text_domain'),
            array(
                'description' => __('Displays a navigation menu with a custom footer style.', 'text_domain'),
            )
        );
    }

    /**
     * Frontend display of the widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Get the selected menu and title
        $nav_menu = !empty($instance['nav_menu']) ? $instance['nav_menu'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Navigation', 'text_domain');

        // Output HTML structure
        ?>
        <h4 class="tp-footer__widget-title"><?php echo esc_html($title); ?></h4>
        <div class="tp-footer__content">
            <?php
            if ($nav_menu) {
                wp_nav_menu(array(
                    'menu' => $nav_menu,
                    'container' => false,
                    'menu_class' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                    'depth' => 1, // Only top-level items
                    'walker' => new Navigation_Widget_Walker(), // Custom walker to add icons
                ));
            } else {
                echo '<p>' . __('Please select a menu.', 'text_domain') . '</p>';
            }
            ?>
        </div>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Backend form for widget settings.
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Navigation', 'text_domain');
        $nav_menu = !empty($instance['nav_menu']) ? $instance['nav_menu'] : '';

        // Get all available menus
        $menus = wp_get_nav_menus();
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'text_domain'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('nav_menu')); ?>">
                <?php _e('Select Menu:', 'text_domain'); ?>
            </label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('nav_menu')); ?>"
                name="<?php echo esc_attr($this->get_field_name('nav_menu')); ?>">
                <option value=""><?php _e('— Select a Menu —', 'text_domain'); ?></option>
                <?php
                foreach ($menus as $menu) {
                    echo '<option value="' . esc_attr($menu->term_id) . '" ' . selected($nav_menu, $menu->term_id, false) . '>' . esc_html($menu->name) . '</option>';
                }
                ?>
            </select>
            <small><?php _e('Create menus under Appearance > Menus.', 'text_domain'); ?></small>
        </p>
        <?php
    }

    /**
     * Sanitize and update widget settings.
     *
     * @param array $new_instance New settings.
     * @param array $old_instance Old settings.
     * @return array Updated settings.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['nav_menu'] = !empty($new_instance['nav_menu']) ? intval($new_instance['nav_menu']) : '';

        return $instance;
    }
}

// Custom Walker to add icons to menu items
class Navigation_Widget_Walker extends Walker_Nav_Menu
{
    /**
     * Start element for menu items.
     *
     * @param string $output Passed by reference.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item.
     * @param array  $args   An array of arguments.
     * @param int    $id     Current item ID.
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

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

        $title = apply_filters('the_title', $item->title, $item->ID);

        // Add the icon before the menu item title
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<i class="fa-sharp fa-solid fa-plus"></i> ';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Enqueue Font Awesome for the icons
function navigation_widget_enqueue_scripts()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'navigation_widget_enqueue_scripts');





class Portx_Social_Media_Widget extends WP_Widget
{

    /**
     * Constructor to set up the widget.
     */
    public function __construct()
    {
        parent::__construct(
            'portx_social_media_widget',
            __('Portx Social Media Widget', 'text_domain'),
            array(
                'description' => __('Displays social media links in the footer with a repeater.', 'text_domain'),
            )
        );
    }

    /**
     * Frontend display of the widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Get social media entries, default to empty array if not set
        $social_links = !empty($instance['social_links']) ? json_decode($instance['social_links'], true) : array();

        // Output HTML structure
        ?>
        <div class="tp-footer__social">
            <ul>
                <?php
                if (!empty($social_links) && is_array($social_links)) {
                    foreach ($social_links as $link) {
                        $icon_class = esc_attr($link['icon_class']);
                        $url = esc_url($link['url']);
                        ?>
                        <li>
                            <a href="<?php echo $url; ?>" target="_blank">
                                <i class="<?php echo $icon_class; ?>"></i>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Backend form for widget settings.
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
        // Get existing social links or set default
        $social_links = !empty($instance['social_links']) ? json_decode($instance['social_links'], true) : array();
        if (!is_array($social_links)) {
            $social_links = array();
        }

        // Hidden field to store social links as JSON
        ?>
        <p>
            <input type="hidden" id="<?php echo esc_attr($this->get_field_id('social_links')); ?>"
                name="<?php echo esc_attr($this->get_field_name('social_links')); ?>"
                value="<?php echo esc_attr(json_encode($social_links)); ?>" class="social-links-data" />
        </p>

        <!-- Repeater Container -->
        <div class="social-links-repeater">
            <h4><?php _e('Social Media Links', 'text_domain'); ?></h4>
            <div class="repeater-items">
                <?php
                if (!empty($social_links)) {
                    foreach ($social_links as $index => $link) {
                        ?>
                        <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                            <p>
                                <label><?php _e('Icon Class', 'text_domain'); ?></label><br>
                                <input type="text" class="widefat social-icon-class"
                                    value="<?php echo esc_attr($link['icon_class']); ?>" placeholder="e.g., fa-brands fa-facebook-f" />
                            </p>
                            <p>
                                <label><?php _e('Link URL', 'text_domain'); ?></label><br>
                                <input type="url" class="widefat social-link-url" value="<?php echo esc_attr($link['url']); ?>"
                                    placeholder="e.g., https://facebook.com" />
                            </p>
                            <p>
                                <button type="button" class="button remove-item"><?php _e('Remove', 'text_domain'); ?></button>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <p>
                <button type="button" class="button add-item"><?php _e('Add Social Link', 'text_domain'); ?></button>
            </p>
        </div>

        <!-- Template for new repeater items -->
        <script type="text/template" id="social-links-repeater-template">
            <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                                                        <p>
                                                            <label><?php _e('Icon Class', 'text_domain'); ?></label><br>
                                                            <input 
                                                                type="text" 
                                                                class="widefat social-icon-class" 
                                                                placeholder="e.g., fa-brands fa-facebook-f"
                                                            />
                                                        </p>
                                                        <p>
                                                            <label><?php _e('Link URL', 'text_domain'); ?></label><br>
                                                            <input 
                                                                type="url" 
                                                                class="widefat social-link-url" 
                                                                placeholder="e.g., https://facebook.com"
                                                            />
                                                        </p>
                                                        <p>
                                                            <button type="button" class="button remove-item"><?php _e('Remove', 'text_domain'); ?></button>
                                                        </p>
                                                    </div>
                                                </script>

        <!-- JavaScript for Repeater Functionality -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // Add new item
                $('.social-links-repeater').on('click', '.add-item', function (e) {
                    e.preventDefault();
                    var template = $('#social-links-repeater-template').html();
                    $(this).closest('.social-links-repeater').find('.repeater-items').append(template);
                    updateSocialLinks();
                });

                // Remove item
                $('.social-links-repeater').on('click', '.remove-item', function (e) {
                    e.preventDefault();
                    $(this).closest('.repeater-item').remove();
                    updateSocialLinks();
                });

                // Update hidden field on change
                $('.social-links-repeater').on('change input', '.social-icon-class, .social-link-url', function () {
                    updateSocialLinks();
                });

                // Function to update hidden field with JSON
                function updateSocialLinks() {
                    var socialLinks = [];
                    $('.social-links-repeater .repeater-item').each(function () {
                        var $item = $(this);
                        socialLinks.push({
                            icon_class: $item.find('.social-icon-class').val(),
                            url: $item.find('.social-link-url').val()
                        });
                    });
                    $('.social-links-data').val(JSON.stringify(socialLinks));
                }
            });
        </script>
        <?php
    }

    /**
     * Sanitize and update widget settings.
     *
     * @param array $new_instance New settings.
     * @param array $old_instance Old settings.
     * @return array Updated settings.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        // Sanitize and validate JSON input
        $social_links = !empty($new_instance['social_links']) ? $new_instance['social_links'] : '';
        if ($social_links) {
            $decoded = json_decode($social_links, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Sanitize each social link entry
                $sanitized_links = array();
                foreach ($decoded as $link) {
                    $sanitized_links[] = array(
                        'icon_class' => sanitize_text_field(isset($link['icon_class']) ? $link['icon_class'] : ''),
                        'url' => esc_url_raw(isset($link['url']) ? $link['url'] : ''),
                    );
                }
                $instance['social_links'] = wp_json_encode($sanitized_links);
            } else {
                $instance['social_links'] = $old_instance['social_links']; // Revert to old if invalid
            }
        } else {
            $instance['social_links'] = ''; // Clear if empty
        }

        return $instance;
    }
}

// Enqueue jQuery (already included in WordPress admin) and Font Awesome
function portx_social_media_widget_scripts()
{
    if (is_admin()) {
        wp_enqueue_script('jquery');
    }
    // Enqueue Font Awesome for the icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'portx_social_media_widget_scripts');
add_action('admin_enqueue_scripts', 'portx_social_media_widget_scripts');





class Portx_Instagram_Gallery_Widget extends WP_Widget
{

    /**
     * Constructor to set up the widget.
     */
    public function __construct()
    {
        parent::__construct(
            'portx_instagram_gallery_widget',
            __('Portx Instagram Gallery Widget', 'text_domain'),
            array(
                'description' => __('Displays an Instagram gallery in the footer with a repeater.', 'text_domain'),
            )
        );
    }

    /**
     * Frontend display of the widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Get the title and gallery entries
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Gallery', 'text_domain');
        $gallery_items = !empty($instance['gallery_items']) ? json_decode($instance['gallery_items'], true) : array();

        // Output HTML structure
        ?>
        <h4 class="tp-footer__widget-title"><?php echo esc_html($title); ?></h4>
        <div class="tp-footer__fw-insta">
            <ul>
                <?php
                if (!empty($gallery_items) && is_array($gallery_items)) {
                    foreach ($gallery_items as $item) {
                        $image_url = esc_url($item['image_url']);
                        ?>
                        <li>
                            <a href="#">
                                <img src="<?php echo $image_url; ?>" alt="">
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php

        echo $args['after_widget'];
    }

    /**
     * Backend form for widget settings.
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Gallery', 'text_domain');
        $gallery_items = !empty($instance['gallery_items']) ? json_decode($instance['gallery_items'], true) : array();
        if (!is_array($gallery_items)) {
            $gallery_items = array();
        }

        // Hidden field to store gallery items as JSON
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'text_domain'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <input type="hidden" id="<?php echo esc_attr($this->get_field_id('gallery_items')); ?>"
                name="<?php echo esc_attr($this->get_field_name('gallery_items')); ?>"
                value="<?php echo esc_attr(json_encode($gallery_items)); ?>" class="gallery-items-data" />
        </p>

        <!-- Repeater Container -->
        <div class="gallery-items-repeater">
            <h4><?php _e('Instagram Gallery Items', 'text_domain'); ?></h4>
            <div class="repeater-items">
                <?php
                if (!empty($gallery_items)) {
                    foreach ($gallery_items as $index => $item) {
                        ?>
                        <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                            <p>
                                <label><?php _e('Image', 'text_domain'); ?></label><br>
                                <input type="text" class="widefat gallery-image-url" value="<?php echo esc_attr($item['image_url']); ?>"
                                    placeholder="Image URL" readonly />
                                <button type="button"
                                    class="button upload-image-button"><?php _e('Upload Image', 'text_domain'); ?></button>
                                <?php if (!empty($item['image_url'])): ?>
                                    <img src="<?php echo esc_attr($item['image_url']); ?>" style="max-width: 100px; margin-top: 10px;" />
                                <?php endif; ?>
                            </p>
                            <p>
                                <button type="button" class="button remove-item"><?php _e('Remove', 'text_domain'); ?></button>
                            </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <p>
                <button type="button" class="button add-item"><?php _e('Add Gallery Item', 'text_domain'); ?></button>
            </p>
        </div>

        <!-- Template for new repeater items -->
        <script type="text/template" id="gallery-items-repeater-template">
            <div class="repeater-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                                        <p>
                                            <label><?php _e('Image', 'text_domain'); ?></label><br>
                                            <input type="text" class="widefat gallery-image-url" placeholder="Image URL" readonly />
                                            <button type="button" class="button upload-image-button"><?php _e('Upload Image', 'text_domain'); ?></button>
                                        </p>
                                        <p>
                                            <button type="button" class="button remove-item"><?php _e('Remove', 'text_domain'); ?></button>
                                        </p>
                                    </div>
                                </script>

        <!-- JavaScript for Repeater and Media Uploader -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // Initialize media uploader
                function initMediaUploader(button) {
                    var frame = wp.media({
                        title: '<?php _e("Select Image", "text_domain"); ?>',
                        button: {
                            text: '<?php _e("Use this image", "text_domain"); ?>'
                        },
                        multiple: false
                    });

                    frame.on('select', function () {
                        var attachment = frame.state().get('selection').first().toJSON();
                        button.siblings('.gallery-image-url').val(attachment.url).trigger('change');
                        button.after('<img src="' + attachment.url +
                            '" style="max-width: 100px; margin-top: 10px;" />');
                    });

                    frame.open();
                }

                // Add new item
                $('.gallery-items-repeater').on('click', '.add-item', function (e) {
                    e.preventDefault();
                    var template = $('#gallery-items-repeater-template').html();
                    $(this).closest('.gallery-items-repeater').find('.repeater-items').append(template);
                    updateGalleryItems();
                });

                // Remove item
                $('.gallery-items-repeater').on('click', '.remove-item', function (e) {
                    e.preventDefault();
                    $(this).closest('.repeater-item').remove();
                    updateGalleryItems();
                });

                // Handle image upload
                $('.gallery-items-repeater').on('click', '.upload-image-button', function (e) {
                    e.preventDefault();
                    initMediaUploader($(this));
                });

                // Update hidden field on change
                $('.gallery-items-repeater').on('change input', '.gallery-image-url', function () {
                    updateGalleryItems();
                });

                // Function to update hidden field with JSON
                function updateGalleryItems() {
                    var galleryItems = [];
                    $('.gallery-items-repeater .repeater-item').each(function () {
                        var $item = $(this);
                        galleryItems.push({
                            image_url: $item.find('.gallery-image-url').val()
                        });
                    });
                    $('.gallery-items-data').val(JSON.stringify(galleryItems));
                }
            });
        </script>
        <?php
    }

    /**
     * Sanitize and update widget settings.
     *
     * @param array $new_instance New settings.
     * @param array $old_instance Old settings.
     * @return array Updated settings.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';

        // Sanitize and validate JSON input
        $gallery_items = !empty($new_instance['gallery_items']) ? $new_instance['gallery_items'] : '';
        if ($gallery_items) {
            $decoded = json_decode($gallery_items, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Sanitize each gallery item
                $sanitized_items = array();
                foreach ($decoded as $item) {
                    $sanitized_items[] = array(
                        'image_url' => esc_url_raw(isset($item['image_url']) ? $item['image_url'] : ''),
                    );
                }
                $instance['gallery_items'] = wp_json_encode($sanitized_items);
            } else {
                $instance['gallery_items'] = $old_instance['gallery_items']; // Revert to old if invalid
            }
        } else {
            $instance['gallery_items'] = ''; // Clear if empty
        }

        return $instance;
    }
}

// Enqueue jQuery, WordPress Media Uploader, and Font Awesome
function portx_instagram_gallery_widget_scripts()
{
    if (is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_media(); // Enqueue WordPress media uploader
    }
    // Enqueue Font Awesome for the icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'portx_instagram_gallery_widget_scripts');
add_action('admin_enqueue_scripts', 'portx_instagram_gallery_widget_scripts');