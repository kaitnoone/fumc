<?php // CSS & JavaScript Enqueues

/**
 * Defer jQuery Parsing using the HTML5 defer property
 */

if (!(is_admin())) {
    function defer_parsing_of_js($url)
    {
        if (false === strpos($url, '.js')) {
            return $url;
        }

        if (strpos($url, 'jquery.js')) {
            return $url;
        }

        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter('clean_url', 'defer_parsing_of_js', 11, 1);
}

/**
 * Link to all theme CSS files.
 */
function prelude_theme_scripts()
{
    // CSS
    wp_enqueue_style('prelude-css', get_template_directory_uri() . '/assets/css/theme.min.css', array(), 8.2);

    // JS
    wp_enqueue_script('prelude-js', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array('jquery'), THEME_VERSION, 1.0);
    wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), 3.3);

    // Font Awesome
    wp_enqueue_script('font-awesome-config', get_template_directory_uri() . '/assets/js/font-awesome.config.js', array(), THEME_VERSION);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js', array('font-awesome-config'), THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'prelude_theme_scripts');