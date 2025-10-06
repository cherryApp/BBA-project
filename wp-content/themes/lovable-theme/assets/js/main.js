/**
 * Main JavaScript file for Lovable Theme
 * Handles interactivity and enhances user experience
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        // Initialize all functionality
        initMobileMenu();
        initCardAnimations();
        initSmoothScrolling();
        initSearchForm();
        initAccessibility();
        initIntersectionObserver();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        // Create mobile menu toggle button if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            $('.navigation-menu').parent().prepend(
                '<button class="mobile-menu-toggle" aria-label="Toggle Navigation">' +
                '<span class="hamburger-icon">' +
                '<span></span><span></span><span></span>' +
                '</span>' +
                '</button>'
            );
        }

        // Toggle menu on button click
        $('.mobile-menu-toggle').on('click', function() {
            const $menu = $('.navigation-menu');
            const $button = $(this);
            
            $menu.toggleClass('is-open');
            $button.toggleClass('is-active');
            
            // Update ARIA attributes
            const isOpen = $menu.hasClass('is-open');
            $button.attr('aria-expanded', isOpen);
            $menu.attr('aria-hidden', !isOpen);
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navigation-menu, .mobile-menu-toggle').length) {
                $('.navigation-menu').removeClass('is-open');
                $('.mobile-menu-toggle').removeClass('is-active');
            }
        });

        // Close menu on window resize if desktop
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.navigation-menu').removeClass('is-open');
                $('.mobile-menu-toggle').removeClass('is-active');
            }
        });
    }

    /**
     * Card Hover Animations
     */
    function initCardAnimations() {
        $('.card').hover(
            function() {
                $(this).addClass('scale-on-hover');
            },
            function() {
                $(this).removeClass('scale-on-hover');
            }
        );

        // Add stagger animation to threat cards
        $('.threat-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
            $(this).addClass('fade-in');
        });
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
            }
        });
    }

    /**
     * Enhanced Search Form
     */
    function initSearchForm() {
        const $searchForm = $('.search-form');
        const $searchInput = $searchForm.find('input[type="search"]');
        const $searchButton = $searchForm.find('button');

        // Add loading state on form submission
        $searchForm.on('submit', function() {
            $searchButton.addClass('loading');
            $searchButton.prop('disabled', true);
        });

        // Auto-complete/suggestions (mock implementation)
        $searchInput.on('input', function() {
            const query = $(this).val();
            
            if (query.length > 2) {
                // Here you would typically make an AJAX call
                // to get search suggestions
                console.log('Search query:', query);
            }
        });

        // Clear search on escape key
        $searchInput.on('keydown', function(e) {
            if (e.key === 'Escape') {
                $(this).val('').blur();
            }
        });
    }

    /**
     * Accessibility Enhancements
     */
    function initAccessibility() {
        // Add skip link
        if (!$('.skip-link').length) {
            $('body').prepend(
                '<a class="skip-link" href="#primary">Skip to main content</a>'
            );
        }

        // Keyboard navigation for cards
        $('.card').attr('tabindex', '0');
        
        $('.card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const $link = $(this).find('a').first();
                if ($link.length) {
                    $link[0].click();
                }
            }
        });

        // Focus management for mobile menu
        $('.mobile-menu-toggle').on('click', function() {
            const $menu = $('.navigation-menu');
            if ($menu.hasClass('is-open')) {
                setTimeout(() => {
                    $menu.find('a').first().focus();
                }, 100);
            }
        });

        // Escape key closes mobile menu
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('.navigation-menu').hasClass('is-open')) {
                $('.navigation-menu').removeClass('is-open');
                $('.mobile-menu-toggle').removeClass('is-active').focus();
            }
        });
    }

    /**
     * Intersection Observer for Animations
     */
    function initIntersectionObserver() {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const $element = $(entry.target);
                        
                        // Add fade-in animation
                        $element.addClass('fade-in');
                        
                        // Add specific animations based on element type
                        if ($element.hasClass('target-group')) {
                            setTimeout(() => {
                                $element.addClass('slide-in-left');
                            }, $element.index() * 100);
                        }
                        
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe elements for animation
            $('.card, .target-group, .badge').each(function() {
                observer.observe(this);
            });
        }
    }

    /**
     * Utility Functions
     */
    
    // Custom easing function
    $.easing.easeInOutCubic = function(x) {
        return x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2;
    };

    // Debounce function
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Throttle function
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * Performance Optimizations
     */
    
    // Lazy loading for images (if native loading="lazy" is not supported)
    if (!('loading' in HTMLImageElement.prototype)) {
        const images = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // Optimize scroll events
    const optimizedResize = throttle(() => {
        // Handle resize events
        $(window).trigger('optimizedResize');
    }, 250);

    $(window).on('resize', optimizedResize);

    /**
     * WordPress Specific Enhancements
     */
    
    // Handle WordPress admin bar
    if ($('#wpadminbar').length) {
        $('html').addClass('admin-bar');
    }

    // Enhance WordPress galleries
    $('.wp-block-gallery').each(function() {
        $(this).addClass('enhanced-gallery');
    });

    // Handle WordPress comments
    if ($('#commentform').length) {
        $('#commentform').addClass('enhanced-form');
        
        // Add loading state to comment form
        $('#commentform').on('submit', function() {
            $(this).find('input[type="submit"]').addClass('loading');
        });
    }

    /**
     * Error Handling
     */
    window.addEventListener('error', function(e) {
        console.error('JavaScript error:', e.error);
        // You could send error reports to analytics here
    });

    // Log initialization
    console.log('Lovable Theme JavaScript initialized');

})(jQuery);

/**
 * Pure JavaScript functions (no jQuery dependency)
 */

// Service Worker registration (if needed)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
                console.log('SW registration failed: ', registrationError);
            });
    });
}

// Critical resource hints
document.addEventListener('DOMContentLoaded', function() {
    // Preload critical resources
    const criticalResources = [
        '/wp-content/themes/lovable-theme/assets/css/main.css',
        '/wp-content/themes/lovable-theme/assets/js/main.js'
    ];

    criticalResources.forEach(resource => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = resource;
        link.as = resource.endsWith('.css') ? 'style' : 'script';
        document.head.appendChild(link);
    });
});