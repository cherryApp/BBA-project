<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div class="min-h-screen bg-gradient-blue">
    <main id="primary" class="site-main">
        <div class="container py-16">
            <section class="error-404 not-found max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-lg shadow p-12">
                    <header class="page-header mb-8">
                        <h1 class="page-title text-4xl font-bold text-gray-900 mb-4">
                            <?php esc_html_e('404', 'lovable-theme'); ?>
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            <?php esc_html_e('Oops! Az oldal nem található', 'lovable-theme'); ?>
                        </p>
                    </header>

                    <div class="page-content">
                        <p class="text-gray-700 mb-8">
                            <?php esc_html_e('Úgy tűnik, hogy amit keresett, nem található itt. Próbálja meg valamelyik alábbi lehetőséget.', 'lovable-theme'); ?>
                        </p>

                        <div class="grid md:grid-cols-2 gap-8 mb-8">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <?php esc_html_e('Keresés', 'lovable-theme'); ?>
                                </h3>
                                <?php get_search_form(); ?>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <?php esc_html_e('Hasznos linkek', 'lovable-theme'); ?>
                                </h3>
                                <ul class="space-y-2 text-left">
                                    <li>
                                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-blue-600 hover:text-blue-800">
                                            <?php esc_html_e('Főoldal', 'lovable-theme'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-blue-600 hover:text-blue-800">
                                            <?php esc_html_e('Digitális fenyegetések', 'lovable-theme'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-blue-600 hover:text-blue-800">
                                            <?php esc_html_e('Biztonsági tippek', 'lovable-theme'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-blue-600 hover:text-blue-800">
                                            <?php esc_html_e('Kapcsolat', 'lovable-theme'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                                <?php esc_html_e('Vissza a főoldalra', 'lovable-theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

<?php get_footer(); ?>