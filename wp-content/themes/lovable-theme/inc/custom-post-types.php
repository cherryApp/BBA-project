<?php
/**
 * Custom Post Types for Lovable Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Threats Custom Post Type
 */
function lovable_register_threats_post_type() {
    $labels = array(
        'name'                  => _x('Threats', 'Post Type General Name', 'lovable-theme'),
        'singular_name'         => _x('Threat', 'Post Type Singular Name', 'lovable-theme'),
        'menu_name'             => __('Threats', 'lovable-theme'),
        'name_admin_bar'        => __('Threat', 'lovable-theme'),
        'archives'              => __('Threat Archives', 'lovable-theme'),
        'attributes'            => __('Threat Attributes', 'lovable-theme'),
        'parent_item_colon'     => __('Parent Threat:', 'lovable-theme'),
        'all_items'             => __('All Threats', 'lovable-theme'),
        'add_new_item'          => __('Add New Threat', 'lovable-theme'),
        'add_new'               => __('Add New', 'lovable-theme'),
        'new_item'              => __('New Threat', 'lovable-theme'),
        'edit_item'             => __('Edit Threat', 'lovable-theme'),
        'update_item'           => __('Update Threat', 'lovable-theme'),
        'view_item'             => __('View Threat', 'lovable-theme'),
        'view_items'            => __('View Threats', 'lovable-theme'),
        'search_items'          => __('Search Threat', 'lovable-theme'),
        'not_found'             => __('Not found', 'lovable-theme'),
        'not_found_in_trash'    => __('Not found in Trash', 'lovable-theme'),
        'featured_image'        => __('Featured Image', 'lovable-theme'),
        'set_featured_image'    => __('Set featured image', 'lovable-theme'),
        'remove_featured_image' => __('Remove featured image', 'lovable-theme'),
        'use_featured_image'    => __('Use as featured image', 'lovable-theme'),
        'insert_into_item'      => __('Insert into threat', 'lovable-theme'),
        'uploaded_to_this_item' => __('Uploaded to this threat', 'lovable-theme'),
        'items_list'            => __('Threats list', 'lovable-theme'),
        'items_list_navigation' => __('Threats list navigation', 'lovable-theme'),
        'filter_items_list'     => __('Filter threats list', 'lovable-theme'),
    );
    
    $args = array(
        'label'                 => __('Threat', 'lovable-theme'),
        'description'           => __('Cybersecurity threats and vulnerabilities', 'lovable-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'taxonomies'            => array('threat_category', 'threat_severity'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-warning',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'threats'),
    );
    
    register_post_type('threats', $args);
}
add_action('init', 'lovable_register_threats_post_type', 0);

/**
 * Register Best Practices Custom Post Type
 */
function lovable_register_best_practices_post_type() {
    $labels = array(
        'name'                  => _x('Best Practices', 'Post Type General Name', 'lovable-theme'),
        'singular_name'         => _x('Best Practice', 'Post Type Singular Name', 'lovable-theme'),
        'menu_name'             => __('Best Practices', 'lovable-theme'),
        'name_admin_bar'        => __('Best Practice', 'lovable-theme'),
        'archives'              => __('Best Practice Archives', 'lovable-theme'),
        'attributes'            => __('Best Practice Attributes', 'lovable-theme'),
        'parent_item_colon'     => __('Parent Best Practice:', 'lovable-theme'),
        'all_items'             => __('All Best Practices', 'lovable-theme'),
        'add_new_item'          => __('Add New Best Practice', 'lovable-theme'),
        'add_new'               => __('Add New', 'lovable-theme'),
        'new_item'              => __('New Best Practice', 'lovable-theme'),
        'edit_item'             => __('Edit Best Practice', 'lovable-theme'),
        'update_item'           => __('Update Best Practice', 'lovable-theme'),
        'view_item'             => __('View Best Practice', 'lovable-theme'),
        'view_items'            => __('View Best Practices', 'lovable-theme'),
        'search_items'          => __('Search Best Practice', 'lovable-theme'),
        'not_found'             => __('Not found', 'lovable-theme'),
        'not_found_in_trash'    => __('Not found in Trash', 'lovable-theme'),
        'featured_image'        => __('Featured Image', 'lovable-theme'),
        'set_featured_image'    => __('Set featured image', 'lovable-theme'),
        'remove_featured_image' => __('Remove featured image', 'lovable-theme'),
        'use_featured_image'    => __('Use as featured image', 'lovable-theme'),
        'insert_into_item'      => __('Insert into best practice', 'lovable-theme'),
        'uploaded_to_this_item' => __('Uploaded to this best practice', 'lovable-theme'),
        'items_list'            => __('Best practices list', 'lovable-theme'),
        'items_list_navigation' => __('Best practices list navigation', 'lovable-theme'),
        'filter_items_list'     => __('Filter best practices list', 'lovable-theme'),
    );
    
    $args = array(
        'label'                 => __('Best Practice', 'lovable-theme'),
        'description'           => __('Cybersecurity best practices and recommendations', 'lovable-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'taxonomies'            => array('practice_category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-shield',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'best-practices'),
    );
    
    register_post_type('best_practices', $args);
}
add_action('init', 'lovable_register_best_practices_post_type', 0);

/**
 * Register Target Groups Custom Post Type
 */
function lovable_register_target_groups_post_type() {
    $labels = array(
        'name'                  => _x('Target Groups', 'Post Type General Name', 'lovable-theme'),
        'singular_name'         => _x('Target Group', 'Post Type Singular Name', 'lovable-theme'),
        'menu_name'             => __('Target Groups', 'lovable-theme'),
        'name_admin_bar'        => __('Target Group', 'lovable-theme'),
        'archives'              => __('Target Group Archives', 'lovable-theme'),
        'attributes'            => __('Target Group Attributes', 'lovable-theme'),
        'parent_item_colon'     => __('Parent Target Group:', 'lovable-theme'),
        'all_items'             => __('All Target Groups', 'lovable-theme'),
        'add_new_item'          => __('Add New Target Group', 'lovable-theme'),
        'add_new'               => __('Add New', 'lovable-theme'),
        'new_item'              => __('New Target Group', 'lovable-theme'),
        'edit_item'             => __('Edit Target Group', 'lovable-theme'),
        'update_item'           => __('Update Target Group', 'lovable-theme'),
        'view_item'             => __('View Target Group', 'lovable-theme'),
        'view_items'            => __('View Target Groups', 'lovable-theme'),
        'search_items'          => __('Search Target Group', 'lovable-theme'),
        'not_found'             => __('Not found', 'lovable-theme'),
        'not_found_in_trash'    => __('Not found in Trash', 'lovable-theme'),
        'featured_image'        => __('Featured Image', 'lovable-theme'),
        'set_featured_image'    => __('Set featured image', 'lovable-theme'),
        'remove_featured_image' => __('Remove featured image', 'lovable-theme'),
        'use_featured_image'    => __('Use as featured image', 'lovable-theme'),
        'insert_into_item'      => __('Insert into target group', 'lovable-theme'),
        'uploaded_to_this_item' => __('Uploaded to this target group', 'lovable-theme'),
        'items_list'            => __('Target groups list', 'lovable-theme'),
        'items_list_navigation' => __('Target groups list navigation', 'lovable-theme'),
        'filter_items_list'     => __('Filter target groups list', 'lovable-theme'),
    );
    
    $args = array(
        'label'                 => __('Target Group', 'lovable-theme'),
        'description'           => __('Target groups for cybersecurity education', 'lovable-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'target-groups'),
    );
    
    register_post_type('target_groups', $args);
}
add_action('init', 'lovable_register_target_groups_post_type', 0);

/**
 * Add custom meta boxes
 */
function lovable_add_custom_meta_boxes() {
    // Threat severity meta box
    add_meta_box(
        'threat-severity',
        __('Threat Severity', 'lovable-theme'),
        'lovable_threat_severity_callback',
        'threats',
        'side',
        'high'
    );
    
    // Threat tips meta box
    add_meta_box(
        'threat-tips',
        __('Protection Tips', 'lovable-theme'),
        'lovable_threat_tips_callback',
        'threats',
        'normal',
        'high'
    );
    
    // Best practice icon meta box
    add_meta_box(
        'practice-icon',
        __('Practice Icon', 'lovable-theme'),
        'lovable_practice_icon_callback',
        'best_practices',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'lovable_add_custom_meta_boxes');

/**
 * Threat severity meta box callback
 */
function lovable_threat_severity_callback($post) {
    wp_nonce_field('lovable_save_meta_box_data', 'lovable_meta_box_nonce');
    
    $value = get_post_meta($post->ID, '_threat_severity', true);
    
    echo '<label for="threat_severity_field">' . __('Severity Level:', 'lovable-theme') . '</label>';
    echo '<select id="threat_severity_field" name="threat_severity_field" class="widefat">';
    echo '<option value="low"' . selected($value, 'low', false) . '>' . __('Low', 'lovable-theme') . '</option>';
    echo '<option value="medium"' . selected($value, 'medium', false) . '>' . __('Medium', 'lovable-theme') . '</option>';
    echo '<option value="high"' . selected($value, 'high', false) . '>' . __('High', 'lovable-theme') . '</option>';
    echo '</select>';
}

/**
 * Threat tips meta box callback
 */
function lovable_threat_tips_callback($post) {
    $tips = get_post_meta($post->ID, '_threat_tips', true);
    if (!is_array($tips)) {
        $tips = array('', '', '');
    }
    
    echo '<p>' . __('Add up to 3 protection tips:', 'lovable-theme') . '</p>';
    
    for ($i = 0; $i < 3; $i++) {
        echo '<p>';
        echo '<label for="threat_tip_' . $i . '">' . sprintf(__('Tip %d:', 'lovable-theme'), $i + 1) . '</label>';
        echo '<input type="text" id="threat_tip_' . $i . '" name="threat_tips[]" value="' . esc_attr($tips[$i] ?? '') . '" class="widefat" />';
        echo '</p>';
    }
}

/**
 * Best practice icon meta box callback
 */
function lovable_practice_icon_callback($post) {
    $icon = get_post_meta($post->ID, '_practice_icon', true);
    
    echo '<label for="practice_icon_field">' . __('Icon Class:', 'lovable-theme') . '</label>';
    echo '<input type="text" id="practice_icon_field" name="practice_icon_field" value="' . esc_attr($icon) . '" class="widefat" />';
    echo '<p class="description">' . __('CSS class for the icon (e.g., dashicons-shield)', 'lovable-theme') . '</p>';
}

/**
 * Save meta box data
 */
function lovable_save_meta_box_data($post_id) {
    if (!isset($_POST['lovable_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['lovable_meta_box_nonce'], 'lovable_save_meta_box_data')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save threat severity
    if (isset($_POST['threat_severity_field'])) {
        update_post_meta($post_id, '_threat_severity', sanitize_text_field($_POST['threat_severity_field']));
    }
    
    // Save threat tips
    if (isset($_POST['threat_tips'])) {
        $tips = array_map('sanitize_text_field', $_POST['threat_tips']);
        $tips = array_filter($tips); // Remove empty tips
        update_post_meta($post_id, '_threat_tips', $tips);
    }
    
    // Save practice icon
    if (isset($_POST['practice_icon_field'])) {
        update_post_meta($post_id, '_practice_icon', sanitize_text_field($_POST['practice_icon_field']));
    }
}
add_action('save_post', 'lovable_save_meta_box_data');

/**
 * Flush rewrite rules on activation
 */
function lovable_flush_rewrite_rules() {
    lovable_register_threats_post_type();
    lovable_register_best_practices_post_type();
    lovable_register_target_groups_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'lovable_flush_rewrite_rules');