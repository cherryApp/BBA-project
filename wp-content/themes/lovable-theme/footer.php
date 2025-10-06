<?php
/**
 * The template for displaying the footer
 */
?>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center">
                    <div class="flex items-center justify-center space-x-4 mb-6">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <!-- Shield Icon SVG -->
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold">
                            <?php echo esc_html(get_bloginfo('name', 'display')); ?>
                        </h4>
                    </div>
                    
                    <!-- Separator -->
                    <div class="border-t border-gray-700 my-6"></div>
                    
                    <div class="grid md:grid-cols-3 gap-8 text-sm">
                        <!-- Footer Widget 1 - Contact Info -->
                        <div>
                            <?php if (is_active_sidebar('footer-1')): ?>
                                <?php dynamic_sidebar('footer-1'); ?>
                            <?php else: ?>
                                <h5 class="font-semibold mb-2"><?php esc_html_e('Elérhetőség', 'lovable-theme'); ?></h5>
                                <p class="text-gray-400">6000 Kecskemét, Kossuth tér 1.</p>
                                <p class="text-gray-400">Tel: +36 76 513-513</p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Footer Widget 2 - Links -->
                        <div>
                            <?php if (is_active_sidebar('footer-2')): ?>
                                <?php dynamic_sidebar('footer-2'); ?>
                            <?php else: ?>
                                <h5 class="font-semibold mb-2"><?php esc_html_e('Hasznos linkek', 'lovable-theme'); ?></h5>
                                <p class="text-gray-400">kecskemet.hu</p>
                                <p class="text-gray-400">kiberpajzs.hu</p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Footer Widget 3 - Updates -->
                        <div>
                            <?php if (is_active_sidebar('footer-3')): ?>
                                <?php dynamic_sidebar('footer-3'); ?>
                            <?php else: ?>
                                <h5 class="font-semibold mb-2"><?php esc_html_e('Frissítve', 'lovable-theme'); ?></h5>
                                <p class="text-gray-400"><?php echo date('Y. F'); ?></p>
                                <p class="text-gray-400"><?php esc_html_e('Digitális Biztonság Projekt', 'lovable-theme'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Separator -->
                    <div class="border-t border-gray-700 my-6"></div>
                    
                    <p class="text-gray-400 text-xs">
                        © <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. <?php esc_html_e('Minden jog fenntartva.', 'lovable-theme'); ?>
                        <?php esc_html_e('Ez az oldal a polgárok digitális biztonságának növelését szolgálja.', 'lovable-theme'); ?>
                    </p>
                </div>
            </div>
        </footer>
        
    </div><!-- #page -->
    
    <?php wp_footer(); ?>
</body>
</html>