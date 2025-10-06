<?php
/**
 * Additional template functions for Lovable Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom excerpt length
 */
function lovable_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'lovable_excerpt_length');

/**
 * Custom excerpt more text
 */
function lovable_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'lovable_excerpt_more');

/**
 * Add custom classes to navigation menu items
 */
function lovable_nav_menu_css_class($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $classes[] = 'primary-nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'lovable_nav_menu_css_class', 10, 3);

/**
 * Custom pagination
 */
function lovable_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    $pagination = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
        'type' => 'array'
    ));
    
    if ($pagination) {
        echo '<nav class="pagination-nav" aria-label="' . esc_attr__('Pagination', 'lovable-theme') . '">';
        echo '<ul class="pagination flex justify-center space-x-2">';
        
        foreach ($pagination as $page) {
            echo '<li class="page-item">' . $page . '</li>';
        }
        
        echo '</ul>';
        echo '</nav>';
    }
}

/**
 * Custom comment form fields
 */
function lovable_comment_form_fields($fields) {
    $fields['author'] = '<div class="form-group mb-4">' .
        '<label for="author" class="block text-sm font-medium text-gray-700 mb-2">' . 
        esc_html__('Name', 'lovable-theme') . ' *</label>' .
        '<input id="author" name="author" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>' .
        '</div>';
    
    $fields['email'] = '<div class="form-group mb-4">' .
        '<label for="email" class="block text-sm font-medium text-gray-700 mb-2">' . 
        esc_html__('Email', 'lovable-theme') . ' *</label>' .
        '<input id="email" name="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>' .
        '</div>';
    
    $fields['url'] = '<div class="form-group mb-4">' .
        '<label for="url" class="block text-sm font-medium text-gray-700 mb-2">' . 
        esc_html__('Website', 'lovable-theme') . '</label>' .
        '<input id="url" name="url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">' .
        '</div>';
    
    return $fields;
}
add_filter('comment_form_default_fields', 'lovable_comment_form_fields');

/**
 * Custom search form
 */
function lovable_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label class="sr-only">' . esc_html__('Search for:', 'lovable-theme') . '</label>
        <div class="search-form-wrapper">
            <input type="search" class="search-field" placeholder="' . esc_attr__('Search...', 'lovable-theme') . '" value="' . get_search_query() . '" name="s" />
            <button type="submit" class="search-submit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">' . esc_html__('Search', 'lovable-theme') . '</span>
            </button>
        </div>
    </form>';
    
    return $form;
}
add_filter('get_search_form', 'lovable_search_form');

/**
 * Custom login form styles
 */
function lovable_login_styles() {
    echo '<style type="text/css">
        .login h1 a {
            background-image: url(' . get_template_directory_uri() . '/assets/images/logo.png);
            background-size: contain;
            width: 100%;
        }
        .login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .login form {
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>';
}
add_action('login_enqueue_scripts', 'lovable_login_styles');

/**
 * Custom admin styles
 */
function lovable_admin_styles() {
    echo '<style type="text/css">
        #adminmenu .wp-menu-image img {
            opacity: 0.6;
        }
        #adminmenu .wp-menu-image img:hover {
            opacity: 1;
        }
    </style>';
}
add_action('admin_head', 'lovable_admin_styles');

/**
 * Breadcrumb function
 */
function lovable_breadcrumb() {
    if (!is_front_page()) {
        echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
        echo '<ol class="breadcrumb-list flex space-x-2 text-sm text-gray-600">';
        
        echo '<li class="breadcrumb-item">';
        echo '<a href="' . esc_url(home_url('/')) . '" class="text-blue-600 hover:text-blue-800">';
        echo esc_html__('Home', 'lovable-theme');
        echo '</a>';
        echo '</li>';
        
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-separator">/</li>';
            
            if (is_single()) {
                $category = get_the_category();
                if ($category) {
                    echo '<li class="breadcrumb-item">';
                    echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="text-blue-600 hover:text-blue-800">';
                    echo esc_html($category[0]->name);
                    echo '</a>';
                    echo '</li>';
                    echo '<li class="breadcrumb-separator">/</li>';
                }
            }
            
            echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
            if (is_single()) {
                echo get_the_title();
            } elseif (is_category()) {
                echo single_cat_title('', false);
            }
            echo '</li>';
        } elseif (is_page()) {
            echo '<li class="breadcrumb-separator">/</li>';
            echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
            echo get_the_title();
            echo '</li>';
        }
        
        echo '</ol>';
        echo '</nav>';
    }
}

/**
 * Related posts function
 */
function lovable_related_posts($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $categories = get_the_category($post_id);
    
    if (!$categories) {
        return;
    }
    
    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }
    
    $related_posts = get_posts(array(
        'category__in' => $category_ids,
        'post__not_in' => array($post_id),
        'posts_per_page' => 3,
        'meta_key' => '_thumbnail_id'
    ));
    
    if ($related_posts) {
        echo '<section class="related-posts py-8">';
        echo '<h3 class="text-2xl font-bold text-gray-900 mb-6">' . esc_html__('Related Posts', 'lovable-theme') . '</h3>';
        echo '<div class="grid md:grid-cols-3 gap-6">';
        
        foreach ($related_posts as $post) {
            setup_postdata($post);
            
            echo '<article class="card">';
            if (has_post_thumbnail($post->ID)) {
                echo '<div class="card-image">';
                echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'w-full h-48 object-cover'));
                echo '</div>';
            }
            echo '<div class="card-content">';
            echo '<h4 class="card-title text-lg font-semibold mb-2">';
            echo '<a href="' . esc_url(get_permalink($post->ID)) . '" class="text-gray-900 hover:text-blue-600">';
            echo esc_html(get_the_title($post->ID));
            echo '</a>';
            echo '</h4>';
            echo '<p class="text-gray-600 text-sm">' . esc_html(get_the_excerpt($post)) . '</p>';
            echo '</div>';
            echo '</article>';
        }
        
        echo '</div>';
        echo '</section>';
        
        wp_reset_postdata();
    }
}

/**
 * Social sharing buttons
 */
function lovable_social_share() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    
    echo '<div class="social-share flex space-x-4">';
    echo '<span class="social-share-label text-sm font-medium text-gray-700">' . esc_html__('Share:', 'lovable-theme') . '</span>';
    
    // Facebook
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank" rel="noopener" class="social-share-link text-blue-600 hover:text-blue-800">';
    echo '<span class="sr-only">Facebook</span>';
    echo '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';
    echo '</a>';
    
    // Twitter
    echo '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank" rel="noopener" class="social-share-link text-blue-400 hover:text-blue-600">';
    echo '<span class="sr-only">Twitter</span>';
    echo '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>';
    echo '</a>';
    
    // LinkedIn
    echo '<a href="https://www.linkedin.com/sharing/share-offsite/?url=' . $url . '" target="_blank" rel="noopener" class="social-share-link text-blue-700 hover:text-blue-900">';
    echo '<span class="sr-only">LinkedIn</span>';
    echo '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>';
    echo '</a>';
    
    echo '</div>';
}