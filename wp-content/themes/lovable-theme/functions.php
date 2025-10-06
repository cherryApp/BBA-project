<?php
/**
 * Lovable Theme Functions
 * 
 * Converted from Next.js Lovable.app design for Kecskemét cybersecurity education project
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function lovable_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'lovable-theme'),
        'footer'  => esc_html__('Footer Menu', 'lovable-theme'),
    ));
    
    // Set content width
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1280;
    }
}
add_action('after_setup_theme', 'lovable_theme_setup');

/**
 * Enqueue scripts and styles
 */
function lovable_theme_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style(
        'lovable-theme-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue custom CSS
    wp_enqueue_style(
        'lovable-theme-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('lovable-theme-style'),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue custom JavaScript
    wp_enqueue_script(
        'lovable-theme-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('lovable-theme-main', 'lovable_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('lovable_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'lovable_theme_scripts');

/**
 * Register widget areas
 */
function lovable_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'lovable-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'lovable-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'lovable-theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1.', 'lovable-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title font-semibold mb-2">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'lovable-theme'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2.', 'lovable-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title font-semibold mb-2">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'lovable-theme'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3.', 'lovable-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title font-semibold mb-2">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'lovable_theme_widgets_init');

/**
 * Custom post types (if needed)
 */
function lovable_theme_custom_post_types() {
    // Threats post type
    register_post_type('threats', array(
        'labels' => array(
            'name'          => 'Threats',
            'singular_name' => 'Threat',
            'add_new_item'  => 'Add New Threat',
            'edit_item'     => 'Edit Threat',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-warning',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'  => true,
    ));
    
    // Best practices post type
    register_post_type('best_practices', array(
        'labels' => array(
            'name'          => 'Best Practices',
            'singular_name' => 'Best Practice',
            'add_new_item'  => 'Add New Best Practice',
            'edit_item'     => 'Edit Best Practice',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-shield',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'lovable_theme_custom_post_types');

/**
 * Custom taxonomies
 */
function lovable_theme_custom_taxonomies() {
    // Severity taxonomy for threats
    register_taxonomy('threat_severity', 'threats', array(
        'labels' => array(
            'name'         => 'Threat Severity',
            'singular_name' => 'Severity',
        ),
        'hierarchical' => true,
        'public'       => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'lovable_theme_custom_taxonomies');

/**
 * Custom template functions
 */

// Get threat severity badge class
function lovable_get_severity_class($severity) {
    switch (strtolower($severity)) {
        case 'magas':
        case 'high':
            return 'badge-destructive';
        case 'közepes':
        case 'medium':
            return 'badge-secondary';
        default:
            return 'badge-outline';
    }
}

// Display threat card
function lovable_display_threat_card($threat_data) {
    $severity = $threat_data['severity'] ?? 'medium';
    $severity_class = lovable_get_severity_class($severity);
    ?>
    <div class="card hover:shadow-lg transition-shadow">
        <div class="card-header">
            <div class="flex items-start justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <?php if (!empty($threat_data['icon'])): ?>
                            <span class="icon text-red-600"><?php echo wp_kses_post($threat_data['icon']); ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="card-title text-xl"><?php echo esc_html($threat_data['title']); ?></h3>
                </div>
                <span class="badge <?php echo esc_attr($severity_class); ?>">
                    <?php echo esc_html($severity); ?>
                </span>
            </div>
            <p class="card-description text-base">
                <?php echo esc_html($threat_data['description']); ?>
            </p>
        </div>
        <div class="card-content">
            <?php if (!empty($threat_data['tips']) && is_array($threat_data['tips'])): ?>
                <div class="space-y-2">
                    <h4 class="font-semibold text-green-700 mb-2">Védekezési tippek:</h4>
                    <ul class="space-y-1">
                        <?php foreach ($threat_data['tips'] as $tip): ?>
                            <li class="flex items-start space-x-2">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                <span class="text-sm text-gray-700"><?php echo esc_html($tip); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

// Display best practice card
function lovable_display_best_practice_card($practice_data) {
    ?>
    <div class="card text-center hover:shadow-lg transition-shadow">
        <div class="card-header">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <?php if (!empty($practice_data['icon'])): ?>
                    <span class="icon-lg text-blue-600"><?php echo wp_kses_post($practice_data['icon']); ?></span>
                <?php endif; ?>
            </div>
            <h3 class="card-title text-lg"><?php echo esc_html($practice_data['title']); ?></h3>
        </div>
        <div class="card-content">
            <p class="card-description text-sm">
                <?php echo esc_html($practice_data['description']); ?>
            </p>
        </div>
    </div>
    <?php
}

// Display target group card
function lovable_display_target_group($group_data) {
    $color_class = $group_data['color'] ?? 'blue';
    ?>
    <div class="text-center">
        <div class="w-20 h-20 bg-<?php echo esc_attr($color_class); ?>-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <?php if (!empty($group_data['icon'])): ?>
                <span class="icon-lg text-<?php echo esc_attr($color_class); ?>-600"><?php echo wp_kses_post($group_data['icon']); ?></span>
            <?php endif; ?>
        </div>
        <h3 class="text-lg font-semibold text-gray-900"><?php echo esc_html($group_data['title']); ?></h3>
        <p class="text-sm text-gray-600"><?php echo esc_html($group_data['description']); ?></p>
    </div>
    <?php
}

/**
 * Performance optimizations
 */
// Remove unnecessary WordPress features
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// Disable emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Defer JavaScript
function lovable_defer_scripts($tag, $handle) {
    if (is_admin()) return $tag;
    return str_replace(' src', ' defer src', $tag);
}
add_filter('script_loader_tag', 'lovable_defer_scripts', 10, 2);

/**
 * Security enhancements
 */
function lovable_add_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'lovable_add_security_headers');

/**
 * Custom hooks and filters
 */

// Add custom body classes
function lovable_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    if (is_page()) {
        $classes[] = 'page-' . get_post_field('post_name');
    }
    
    return $classes;
}
add_filter('body_class', 'lovable_body_classes');

// Customizer settings
function lovable_customizer($wp_customize) {
    // Header section
    $wp_customize->add_section('lovable_header', array(
        'title'    => __('Header Settings', 'lovable-theme'),
        'priority' => 30,
    ));
    
    // Header banner image
    $wp_customize->add_setting('header_banner_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_banner_image', array(
        'label'    => __('Header Banner Image', 'lovable-theme'),
        'section'  => 'lovable_header',
        'settings' => 'header_banner_image',
    )));
    
    // Project title
    $wp_customize->add_setting('project_title', array(
        'default'   => 'Kiberbűnözés elleni fellépést célzó megelőzési programok Kecskeméten és térségében',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('project_title', array(
        'label'    => __('Project Title', 'lovable-theme'),
        'section'  => 'lovable_header',
        'type'     => 'textarea',
    ));
    
    // Project ID
    $wp_customize->add_setting('project_id', array(
        'default'   => 'BBA_PLUSZ-3.3.2-24-2024-00009',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('project_id', array(
        'label'    => __('Project ID', 'lovable-theme'),
        'section'  => 'lovable_header',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'lovable_customizer');

/**
 * Include additional files
 */
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/theme-customizer.php';