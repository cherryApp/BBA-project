
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
        