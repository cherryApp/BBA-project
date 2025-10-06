<?php
/**
 * Main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

get_header(); ?>

<div class="min-h-screen bg-gradient-blue">
    <?php if (is_front_page()): ?>
        <?php get_template_part('template-parts/content', 'front-page'); ?>
    <?php else: ?>
        <main id="primary" class="site-main">
            <div class="container py-16">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php get_template_part('template-parts/content'); ?>
                    <?php endwhile; ?>
                    
                    <?php the_posts_navigation(); ?>
                <?php else: ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>
        </main>
    <?php endif; ?>
</div>

<?php get_footer(); ?>