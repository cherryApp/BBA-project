<?php
/**
 * Theme Customizer for Lovable Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme customizer settings
 */
function lovable_customize_register($wp_customize) {
    
    // Header Section
    $wp_customize->add_section('lovable_header_section', array(
        'title'       => __('Header Settings', 'lovable-theme'),
        'priority'    => 30,
        'description' => __('Customize the header appearance and content.', 'lovable-theme'),
    ));
    
    // Header Banner Image
    $wp_customize->add_setting('lovable_header_banner', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'lovable_header_banner', array(
        'label'       => __('Header Banner Image', 'lovable-theme'),
        'description' => __('Upload an image for the header banner (recommended size: 1920x200px)', 'lovable-theme'),
        'section'     => 'lovable_header_section',
        'settings'    => 'lovable_header_banner',
    )));
    
    // Project Title
    $wp_customize->add_setting('lovable_project_title', array(
        'default'           => 'Kiberbűnözés elleni fellépést célzó megelőzési programok Kecskeméten és térségében',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('lovable_project_title', array(
        'label'       => __('Project Title', 'lovable-theme'),
        'description' => __('Main project title displayed in the header section.', 'lovable-theme'),
        'section'     => 'lovable_header_section',
        'type'        => 'textarea',
    ));
    
    // Project ID
    $wp_customize->add_setting('lovable_project_id', array(
        'default'           => 'BBA_PLUSZ-3.3.2-24-2024-00009',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('lovable_project_id', array(
        'label'       => __('Project ID', 'lovable-theme'),
        'description' => __('Project identification number.', 'lovable-theme'),
        'section'     => 'lovable_header_section',
        'type'        => 'text',
    ));
    
    // Colors Section
    $wp_customize->add_section('lovable_colors_section', array(
        'title'       => __('Color Settings', 'lovable-theme'),
        'priority'    => 40,
        'description' => __('Customize theme colors.', 'lovable-theme'),
    ));
    
    // Primary Color
    $wp_customize->add_setting('lovable_primary_color', array(
        'default'           => '#2563eb',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lovable_primary_color', array(
        'label'       => __('Primary Color', 'lovable-theme'),
        'description' => __('Main brand color used for buttons and links.', 'lovable-theme'),
        'section'     => 'lovable_colors_section',
        'settings'    => 'lovable_primary_color',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('lovable_secondary_color', array(
        'default'           => '#64748b',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lovable_secondary_color', array(
        'label'       => __('Secondary Color', 'lovable-theme'),
        'description' => __('Secondary color for accents and subtle elements.', 'lovable-theme'),
        'section'     => 'lovable_colors_section',
        'settings'    => 'lovable_secondary_color',
    )));
    
    // Content Section
    $wp_customize->add_section('lovable_content_section', array(
        'title'       => __('Content Settings', 'lovable-theme'),
        'priority'    => 50,
        'description' => __('Customize content display and behavior.', 'lovable-theme'),
    ));
    
    // Show Emergency Contact Section
    $wp_customize->add_setting('lovable_show_emergency_contact', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'lovable_sanitize_checkbox',
    ));
    
    $wp_customize->add_control('lovable_show_emergency_contact', array(
        'label'       => __('Show Emergency Contact Section', 'lovable-theme'),
        'description' => __('Display emergency contact information on the homepage.', 'lovable-theme'),
        'section'     => 'lovable_content_section',
        'type'        => 'checkbox',
    ));
    
    // Emergency Contact Title
    $wp_customize->add_setting('lovable_emergency_title', array(
        'default'           => 'Segítségre van szüksége?',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('lovable_emergency_title', array(
        'label'       => __('Emergency Contact Title', 'lovable-theme'),
        'description' => __('Title for the emergency contact section.', 'lovable-theme'),
        'section'     => 'lovable_content_section',
        'type'        => 'text',
        'active_callback' => 'lovable_is_emergency_contact_active',
    ));
    
    // Emergency Contact Description
    $wp_customize->add_setting('lovable_emergency_description', array(
        'default'           => 'Ha kiberbiztonsági incidensbe keveredett, vagy gyanús tevékenységet észlelt, ne habozzon segítséget kérni.',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('lovable_emergency_description', array(
        'label'       => __('Emergency Contact Description', 'lovable-theme'),
        'description' => __('Description text for the emergency contact section.', 'lovable-theme'),
        'section'     => 'lovable_content_section',
        'type'        => 'textarea',
        'active_callback' => 'lovable_is_emergency_contact_active',
    ));
    
    // Footer Section
    $wp_customize->add_section('lovable_footer_section', array(
        'title'       => __('Footer Settings', 'lovable-theme'),
        'priority'    => 60,
        'description' => __('Customize footer content and appearance.', 'lovable-theme'),
    ));
    
    // Footer Copyright Text
    $wp_customize->add_setting('lovable_footer_copyright', array(
        'default'           => 'Minden jog fenntartva. Ez az oldal a polgárok digitális biztonságának növelését szolgálja.',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('lovable_footer_copyright', array(
        'label'       => __('Footer Copyright Text', 'lovable-theme'),
        'description' => __('Copyright text displayed in the footer.', 'lovable-theme'),
        'section'     => 'lovable_footer_section',
        'type'        => 'textarea',
    ));
    
    // Footer Background Color
    $wp_customize->add_setting('lovable_footer_bg_color', array(
        'default'           => '#111827',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lovable_footer_bg_color', array(
        'label'       => __('Footer Background Color', 'lovable-theme'),
        'description' => __('Background color for the footer section.', 'lovable-theme'),
        'section'     => 'lovable_footer_section',
        'settings'    => 'lovable_footer_bg_color',
    )));
    
    // Typography Section
    $wp_customize->add_section('lovable_typography_section', array(
        'title'       => __('Typography Settings', 'lovable-theme'),
        'priority'    => 70,
        'description' => __('Customize fonts and typography.', 'lovable-theme'),
    ));
    
    // Font Family
    $wp_customize->add_setting('lovable_font_family', array(
        'default'           => 'system',
        'transport'         => 'refresh',
        'sanitize_callback' => 'lovable_sanitize_font_family',
    ));
    
    $wp_customize->add_control('lovable_font_family', array(
        'label'       => __('Font Family', 'lovable-theme'),
        'description' => __('Choose the main font family for the theme.', 'lovable-theme'),
        'section'     => 'lovable_typography_section',
        'type'        => 'select',
        'choices'     => array(
            'system'  => __('System Font', 'lovable-theme'),
            'inter'   => __('Inter', 'lovable-theme'),
            'roboto'  => __('Roboto', 'lovable-theme'),
            'nunito'  => __('Nunito', 'lovable-theme'),
            'lato'    => __('Lato', 'lovable-theme'),
        ),
    ));
    
    // Layout Section
    $wp_customize->add_section('lovable_layout_section', array(
        'title'       => __('Layout Settings', 'lovable-theme'),
        'priority'    => 80,
        'description' => __('Customize layout and spacing.', 'lovable-theme'),
    ));
    
    // Container Width
    $wp_customize->add_setting('lovable_container_width', array(
        'default'           => '1280',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('lovable_container_width', array(
        'label'       => __('Container Max Width (px)', 'lovable-theme'),
        'description' => __('Maximum width for the main content container.', 'lovable-theme'),
        'section'     => 'lovable_layout_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 20,
        ),
    ));
}
add_action('customize_register', 'lovable_customize_register');

/**
 * Sanitize checkbox values
 */
function lovable_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Sanitize font family choices
 */
function lovable_sanitize_font_family($input) {
    $valid = array('system', 'inter', 'roboto', 'nunito', 'lato');
    return (in_array($input, $valid) ? $input : 'system');
}

/**
 * Active callback for emergency contact settings
 */
function lovable_is_emergency_contact_active($control) {
    return get_theme_mod('lovable_show_emergency_contact', true);
}

/**
 * Generate custom CSS based on customizer settings
 */
function lovable_customizer_css() {
    $primary_color = get_theme_mod('lovable_primary_color', '#2563eb');
    $secondary_color = get_theme_mod('lovable_secondary_color', '#64748b');
    $footer_bg_color = get_theme_mod('lovable_footer_bg_color', '#111827');
    $container_width = get_theme_mod('lovable_container_width', '1280');
    $font_family = get_theme_mod('lovable_font_family', 'system');
    
    // Font family CSS
    $font_css = '';
    switch ($font_family) {
        case 'inter':
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            $font_css = "font-family: 'Inter', sans-serif;";
            break;
        case 'roboto':
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
            $font_css = "font-family: 'Roboto', sans-serif;";
            break;
        case 'nunito':
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap');
            $font_css = "font-family: 'Nunito', sans-serif;";
            break;
        case 'lato':
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
            $font_css = "font-family: 'Lato', sans-serif;";
            break;
        default:
            $font_css = "font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;";
            break;
    }
    
    $custom_css = "
        :root {
            --color-primary: {$primary_color};
            --color-secondary: {$secondary_color};
            --footer-bg-color: {$footer_bg_color};
            --container-max-width: {$container_width}px;
        }
        
        body {
            {$font_css}
        }
        
        .btn-primary,
        .bg-blue-600 {
            background-color: {$primary_color} !important;
        }
        
        .text-blue-600,
        a:hover {
            color: {$primary_color} !important;
        }
        
        .border-blue-600 {
            border-color: {$primary_color} !important;
        }
        
        footer {
            background-color: {$footer_bg_color} !important;
        }
        
        .container,
        .max-w-7xl {
            max-width: {$container_width}px !important;
        }
    ";
    
    return $custom_css;
}

/**
 * Output customizer CSS
 */
function lovable_output_customizer_css() {
    echo '<style type="text/css" id="lovable-customizer-css">';
    echo lovable_customizer_css();
    echo '</style>';
}
add_action('wp_head', 'lovable_output_customizer_css');

/**
 * Customizer preview script
 */
function lovable_customizer_preview_js() {
    wp_enqueue_script('lovable-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array('customize-preview'), wp_get_theme()->get('Version'), true);
}
add_action('customize_preview_init', 'lovable_customizer_preview_js');

/**
 * Create customizer preview JS file
 */
function lovable_create_customizer_preview_js() {
    $file_path = get_template_directory() . '/assets/js/customizer-preview.js';
    
    if (!file_exists($file_path)) {
        $js_content = "
(function($) {
    'use strict';
    
    // Project Title
    wp.customize('lovable_project_title', function(value) {
        value.bind(function(newval) {
            $('.project-title').text(newval);
        });
    });
    
    // Project ID
    wp.customize('lovable_project_id', function(value) {
        value.bind(function(newval) {
            $('.project-id').text(newval);
        });
    });
    
    // Primary Color
    wp.customize('lovable_primary_color', function(value) {
        value.bind(function(newval) {
            $('<style>').prop('type', 'text/css').html('
                .btn-primary, .bg-blue-600 { background-color: ' + newval + ' !important; }
                .text-blue-600, a:hover { color: ' + newval + ' !important; }
                .border-blue-600 { border-color: ' + newval + ' !important; }
            ').appendTo('head');
        });
    });
    
    // Footer Background Color
    wp.customize('lovable_footer_bg_color', function(value) {
        value.bind(function(newval) {
            $('footer').css('background-color', newval);
        });
    });
    
    // Emergency Contact Title
    wp.customize('lovable_emergency_title', function(value) {
        value.bind(function(newval) {
            $('.emergency-contact-title').text(newval);
        });
    });
    
    // Emergency Contact Description
    wp.customize('lovable_emergency_description', function(value) {
        value.bind(function(newval) {
            $('.emergency-contact-description').text(newval);
        });
    });
    
    // Footer Copyright
    wp.customize('lovable_footer_copyright', function(value) {
        value.bind(function(newval) {
            $('.footer-copyright').text(newval);
        });
    });

})(jQuery);
        ";
        
        file_put_contents($file_path, $js_content);
    }
}
add_action('init', 'lovable_create_customizer_preview_js');