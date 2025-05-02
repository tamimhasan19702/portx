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
            'title' => esc_html__('Portx Header Logo', 'portx'),
            'description' => esc_html__('Portx Header Section Description', 'portx'),
            'panel' => 'portx_kirki_panel',
            'priority' => 160,
        ]);

        if (class_exists('Kirki\Field')) {

            \Kirki::add_field('portx_header_logo', [
                'type' => 'image',
                'settings' => 'portx_header_logo',
                'label' => esc_html__('Portx Header Logo', 'portx'),
                'description' => esc_html__('The saved value will be the URL.', 'portx'),
                'section' => 'portx_header_section',
                'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
            ]);

        }
    }
}

portx_header_section();