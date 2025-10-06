<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
        <!-- Header Banner -->
        <header class="w-full">
            <?php 
            $header_banner = get_theme_mod('header_banner_image');
            if ($header_banner): ?>
                <img 
                    src="<?php echo esc_url($header_banner); ?>" 
                    alt="<?php esc_attr_e('Széchenyi Terv Plusz és EU logók banner', 'lovable-theme'); ?>" 
                    class="w-full h-auto"
                />
            <?php else: ?>
                <!-- Default banner placeholder -->
                <div class="w-full bg-blue-600 py-4">
                    <div class="container text-center">
                        <p class="text-white text-sm">
                            <?php esc_html_e('EU és Széchenyi Terv Plusz támogatással', 'lovable-theme'); ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </header>

        <!-- Navigation Menu -->
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-center space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navigation-menu',
                        'container'      => false,
                        'fallback_cb'    => 'lovable_fallback_menu',
                        'walker'         => new Lovable_Walker_Nav_Menu(),
                    ));
                    ?>
                </div>
            </div>
        </nav>

        <?php if (is_front_page()): ?>
            <!-- Project Info Section -->
            <section class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-blue-header relative">
                <?php 
                $bg_image_url = get_template_directory_uri() . '/assets/images/background-pattern.png';
                ?>
                <div 
                    class="absolute inset-0 opacity-20 bg-cover bg-center"
                    style="background-image: url('<?php echo esc_url($bg_image_url); ?>')"
                ></div>
                <div class="max-w-7xl mx-auto text-center relative z-10">
                    <h1 class="text-3xl md:text-4xl font-semibold text-white mb-4 leading-relaxed">
                        <?php echo esc_html(get_theme_mod('project_title', 'Kiberbűnözés elleni fellépést célzó megelőzési programok Kecskeméten és térségében')); ?>
                    </h1>
                    <p class="text-base font-normal text-white/90">
                        <?php echo esc_html(get_theme_mod('project_id', 'BBA_PLUSZ-3.3.2-24-2024-00009')); ?>
                    </p>
                </div>
            </section>
        <?php endif; ?>

<?php
/**
 * Custom Navigation Walker
 */
class Lovable_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    // Start Level - <ul>
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= "\n<ul class=\"sub-menu\">\n";
    }
    
    // End Level - </ul>
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</ul>\n";
    }
    
    // Start Element - <li>
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= '<li' . $id . $class_names .'>';
        
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        $attributes .= ' class="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium"';
        
        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    // End Element - </li>
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Fallback menu if no menu is assigned
 */
function lovable_fallback_menu() {
    $menu_items = array(
        array('title' => 'Rendezvények', 'url' => '#'),
        array('title' => 'Galéria', 'url' => '#'),
        array('title' => 'Hírek', 'url' => '#'),
        array('title' => 'Friss információk', 'url' => '#'),
    );
    
    foreach ($menu_items as $item) {
        echo '<a href="' . esc_url($item['url']) . '" class="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium">';
        echo esc_html($item['title']);
        echo '</a>';
    }
}
?>