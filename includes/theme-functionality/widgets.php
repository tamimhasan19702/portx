<?php

class Portx_Contact_Info_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'portx_contact_info_widget',
            __('Portx: Footer Contact Info', 'portx'),
            array('description' => __('Displays logo, description, and contact info in the footer.', 'portx'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $description = !empty($instance['description']) ? esc_html($instance['description']) : __('Desires to obtain pain of it because it is pain, but occasionally circum', 'portx');
        $phone = !empty($instance['phone']) ? esc_html($instance['phone']) : '';
        $email = !empty($instance['email']) ? esc_html($instance['email']) : '';
        $map_link = !empty($instance['map_link']) ? esc_url($instance['map_link']) : '';
        $address = !empty($instance['address']) ? esc_html($instance['address']) : ''; ?>

        <div class="tp-footer__widget tp-footer-col-1 mb-40 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="tp-footer__widget-logo">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/footer-logo.png'); ?>" alt="">
            </a>
            <div class="tp-footer__text mt-15 mb-25">
                <p><?php echo $description; ?></p>
            </div>
            <div class="tp-footer__contact-info tp-footer__icon-space">
                <ul>
                    <li>
                        <span><i class="fa-solid fa-square-phone"></i></span>
                        <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                    </li>
                    <li>
                        <span><i class="fa-sharp fa-solid fa-envelope"></i></span>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </li>
                    <li>
                        <span><i class="flaticon-location"></i></span>
                        <a href="<?php echo $map_link; ?>" target="_blank"><?php echo $address; ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $email = !empty($instance['email']) ? $instance['email'] : '';
        $map_link = !empty($instance['map_link']) ? $instance['map_link'] : '';
        $address = !empty($instance['address']) ? $instance['address'] : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'portx'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('description'); ?>"
                name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone Number:', 'portx'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"
                name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'portx'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>"
                name="<?php echo $this->get_field_name('email'); ?>" type="email" value="<?php echo esc_attr($email); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('map_link'); ?>"><?php _e('Google Maps Link:', 'portx'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('map_link'); ?>"
                name="<?php echo $this->get_field_name('map_link'); ?>" type="url" value="<?php echo esc_attr($map_link); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'portx'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>"
                name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['description'] = sanitize_text_field($new_instance['description']);
        $instance['phone'] = sanitize_text_field($new_instance['phone']);
        $instance['email'] = sanitize_email($new_instance['email']);
        $instance['map_link'] = esc_url_raw($new_instance['map_link']);
        $instance['address'] = sanitize_text_field($new_instance['address']);
        return $instance;
    }
}

function portx_register_widgets()
{
    register_widget('Portx_Contact_Info_Widget');
}
add_action('widgets_init', 'portx_register_widgets');