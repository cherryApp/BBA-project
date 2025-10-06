<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div class="min-h-screen bg-gradient-blue">
    <main id="primary" class="site-main">
        <div class="container py-16">
            <?php while (have_posts()): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
                    <header class="entry-header text-center mb-8">
                        <h1 class="entry-title text-4xl font-bold text-gray-900 mb-4">
                            <?php the_title(); ?>
                        </h1>
                        
                        <?php if (has_post_thumbnail()): ?>
                            <div class="featured-image mb-8">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg shadow')); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content bg-white rounded-lg shadow p-8">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links mt-8 pt-4 border-t border-gray-200">' . esc_html__('Pages:', 'lovable-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php if (get_edit_post_link()): ?>
                        <footer class="entry-footer mt-8 text-center">
                            <?php edit_post_link(
                                sprintf(
                                    wp_kses(
                                        __('Edit <span class="screen-reader-text">"%s"</span>', 'lovable-theme'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ),
                                '<span class="edit-link btn btn-outline">',
                                '</span>'
                            ); ?>
                        </footer>
                    <?php endif; ?>
                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>