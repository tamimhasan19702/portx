<?php

function portx_panels()
{
    if (class_exists('Kirki\Panel')) {
        \Kirki::add_panel('portx_kirki_panel', [
            'priority' => 10,
            'title' => esc_html__('Portx Options', 'portx'),
            'description' => esc_html__('Portx Options Description.', 'portx'),
        ]);
    }
}

portx_panels();

function portx_header_section()
{
    if (class_exists('Kirki\Section')) {
        \Kirki::add_section('portx_header_section', [
            'title' => esc_html__('Portx Header Options', 'portx'),
            'panel' => 'portx_kirki_panel',
            'priority' => 160,
        ]);

        if (class_exists('Kirki\Field')) {
            // Header Type Selection
            \Kirki::add_field('portx_header_type', [
                'type' => 'select',
                'settings' => 'portx_header_type',
                'label' => esc_html__('Portx Header Type', 'portx'),
                'description' => esc_html__('Chose a Portx Header.', 'portx'),
                'section' => 'portx_header_section',
                'default' => 'header-1',
                'choices' => [
                    'header-1' => esc_html__('Header 1', 'portx'),
                    'header-2' => esc_html__('Header 2', 'portx'),
                ],
            ]);

            // Header 1 Options (shown only when Header 1 is selected)
            \Kirki::add_field('portx_header_logo_header1', [
                'type' => 'image',
                'settings' => 'portx_header_logo_header1',
                'label' => esc_html__('Portx Header Logo (Header 1)', 'portx'),
                'description' => esc_html__('The saved value will be the URL.', 'portx'),
                'section' => 'portx_header_section',
                'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            \Kirki::add_field('portx_header_button_text', [
                'type' => 'text',
                'settings' => 'portx_header_button_text',
                'label' => esc_html__('Header Button Text (Header 1)', 'portx'),
                'description' => esc_html__('Text for the header button.', 'portx'),
                'section' => 'portx_header_section',
                'default' => esc_html__('Request a Quote', 'portx'),
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            \Kirki::add_field('portx_header_button_url', [
                'type' => 'url',
                'settings' => 'portx_header_button_url',
                'label' => esc_html__('Header Button URL (Header 1)', 'portx'),
                'description' => esc_html__('URL for the header button.', 'portx'),
                'section' => 'portx_header_section',
                'default' => esc_url(home_url('/contact')),
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            \Kirki::add_field('portx_search_logo', [
                'type' => 'image',
                'settings' => 'portx_search_logo',
                'label' => esc_html__('Search Form Logo (Header 1)', 'portx'),
                'description' => esc_html__('Logo for the search form.', 'portx'),
                'section' => 'portx_header_section',
                'default' => get_template_directory_uri() . '/assets/img/logo/search-logo.png',
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            \Kirki::add_field('portx_search_placeholder', [
                'type' => 'text',
                'settings' => 'portx_search_placeholder',
                'label' => esc_html__('Search Placeholder Text (Header 1)', 'portx'),
                'description' => esc_html__('The placeholder text that will be displayed in the search form.', 'portx'),
                'section' => 'portx_header_section',
                'default' => esc_html__('Search for...', 'portx'),
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            \Kirki::add_field('portx_contact_info', [
                'type' => 'repeater',
                'settings' => 'portx_contact_info',
                'label' => esc_html__('Portx Contact Info (Header 1)', 'portx'),
                'description' => esc_html__('You can add multiple contact blocks here.', 'portx'),
                'section' => 'portx_header_section',
                'priority' => 10,
                'row_label' => [
                    'type' => 'text',
                    'value' => esc_attr__('Contact Info', 'portx'),
                ],
                'button_label' => esc_html__('Add New Contact Info', 'portx'),
                'fields' => [
                    'flaticon_class' => [
                        'type' => 'text',
                        'label' => esc_html__('Flaticon Class', 'portx'),
                        'description' => esc_html__('Add the flaticon class name here.', 'portx'),
                    ],
                    'header' => [
                        'type' => 'text',
                        'label' => esc_html__('Header', 'portx'),
                    ],
                    'description' => [
                        'type' => 'textarea',
                        'label' => esc_html__('Description', 'portx'),
                    ],
                    'url' => [
                        'type' => 'url',
                        'label' => esc_html__('Url', 'portx'),
                        'description' => esc_html__('The saved value will be the URL.', 'portx'),
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-1',
                    ],
                ],
            ]);

            // Header 2 Options (shown only when Header 2 is selected)
            \Kirki::add_field('portx_header_logo_header2', [
                'type' => 'image',
                'settings' => 'portx_header_logo_header2',
                'label' => esc_html__('Portx Header Logo (Header 2)', 'portx'),
                'description' => esc_html__('The saved value will be the URL.', 'portx'),
                'section' => 'portx_header_section',
                'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
                'active_callback' => [
                    [
                        'setting' => 'portx_header_type',
                        'operator' => '==',
                        'value' => 'header-2',
                    ],
                ],
            ]);

            // Demo Menu Options (always visible)
            \Kirki::add_field('portx_demo_menu', [
                'type' => 'repeater',
                'settings' => 'portx_demo_menu',
                'label' => esc_html__('Demo Menu Options', 'portx'),
                'description' => esc_html__('Add options for demo menu.', 'portx'),
                'section' => 'portx_header_section',
                'priority' => 21,
                'row_label' => [
                    'type' => 'text',
                    'value' => esc_attr__('Demo Option', 'portx'),
                ],
                'button_label' => esc_html__('Add New Demo Option', 'portx'),
                'fields' => [
                    'image' => [
                        'type' => 'image',
                        'label' => esc_html__('Demo Image', 'portx'),
                        'description' => esc_html__('Select an image for the demo option.', 'portx'),
                    ],
                    'button_text' => [
                        'type' => 'text',
                        'label' => esc_html__('Button Text', 'portx'),
                        'description' => esc_html__('Text for the demo button.', 'portx'),
                    ],
                    'link' => [
                        'type' => 'url',
                        'label' => esc_html__('Link', 'portx'),
                        'description' => esc_html__('URL for the demo option.', 'portx'),
                    ],
                    'header' => [
                        'type' => 'text',
                        'label' => esc_html__('Header', 'portx'),
                        'description' => esc_html__('Header for the demo option.', 'portx'),
                    ],
                ],
            ]);
        }
    }
}

portx_header_section();


function portex_footer_section()
{
    if (class_exists('Kirki\Section')) {
        \Kirki::add_section('portx_footer_section', [
            'title' => esc_html__('Portx Footer Options', 'portx'),
            'panel' => 'portx_kirki_panel',
            'priority' => 160,
        ]);

        if (class_exists('Kirki\Field')) {

            \Kirki::add_field('portx_footer_copyright', [
                'type' => 'text',
                'settings' => 'portx_footer_copyright',
                'label' => esc_html__('Footer Copyright Text', 'portx'),
                'description' => esc_html__('Text displayed in the footer copyright section.', 'portx'),
                'section' => 'portx_footer_section',
                'default' => esc_html__('© 2023 Portx. All rights reserved.', 'portx'),
            ]);

            \Kirki::add_field('portx_show_car_png', [
                'type' => 'checkbox',
                'settings' => 'portx_show_car_png',
                'label' => esc_html__('Show Car PNG', 'portx'),
                'description' => esc_html__('Show car png in the footer section.', 'portx'),
                'section' => 'portx_footer_section',
                'default' => true,
            ]);

        }


    }
}

portex_footer_section();