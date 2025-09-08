<?php
/**
 * Simple WordPress compatibility layer for development
 * This allows WordPress theme functions to work in standalone mode
 */

// Define WordPress constants
define('ABSPATH', __DIR__ . '/');
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

// Simple WordPress function replacements for development
if (!function_exists('get_header')) {
    function get_header() {
        require_once 'header.php';
    }
}

if (!function_exists('get_footer')) {
    function get_footer() {
        require_once 'footer.php';
    }
}

if (!function_exists('get_theme_file_uri')) {
    function get_theme_file_uri($path) {
        return $path;
    }
}

if (!function_exists('esc_url')) {
    function esc_url($url) {
        return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('home_url')) {
    function home_url($path = '') {
        $base_url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];
        return $base_url . $path;
    }
}

if (!function_exists('wp_nav_menu')) {
    function wp_nav_menu($args = array()) {
        // Simple fallback navigation
        echo '<nav class="footer-menu"><ul>';
        echo '<li><a href="/">Sākums</a></li>';
        echo '<li><a href="/page-pakalpojums.php">Pakalpojumi</a></li>';
        echo '<li><a href="/page-komanda.php">Komanda</a></li>';
        echo '<li><a href="/page-atsauksmes.php">Atsauksmes</a></li>';
        echo '<li><a href="/page-ziedojumi.php">Ziedojumi</a></li>';
        echo '<li><a href="/page-vakances.php">Vakances</a></li>';
        echo '<li><a href="/page-brivpratigo-darbs.php">Brīvprātīgo darbs</a></li>';
        echo '</ul></nav>';
    }
}

if (!function_exists('bloginfo')) {
    function bloginfo($show = '') {
        switch ($show) {
            case 'name':
                echo 'Samarieši@Med4You';
                break;
            case 'description':
                echo 'Paliatīvās aprūpes pakalpojumi';
                break;
            default:
                echo 'Samarieši@Med4You';
        }
    }
}

if (!function_exists('date_i18n')) {
    function date_i18n($format, $timestamp = 0) {
        return date($format, $timestamp ?: time());
    }
}

if (!function_exists('language_attributes')) {
    function language_attributes() {
        echo 'lang="lv"';
    }
}

if (!function_exists('wp_head')) {
    function wp_head() {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="stylesheet" href="/style.css">';
    }
}

if (!function_exists('wp_footer')) {
    function wp_footer() {
        echo '<script src="/script.js"></script>';
        echo '<script src="/mobile-menu.js"></script>';
    }
}

if (!function_exists('body_class')) {
    function body_class($class = '') {
        echo 'class="' . $class . '"';
    }
}

if (!function_exists('wp_title')) {
    function wp_title($sep = '', $display = true) {
        $title = 'Samarieši@Med4You - Paliatīvās aprūpes pakalpojumi';
        if ($display) {
            echo $title;
        }
        return $title;
    }
}

if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri() {
        return '';
    }
}

if (!function_exists('get_stylesheet_uri')) {
    function get_stylesheet_uri() {
        return '/style.css';
    }
}

if (!function_exists('esc_attr')) {
    function esc_attr($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('esc_html')) {
    function esc_html($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('esc_js')) {
    function esc_js($text) {
        return addslashes($text);
    }
}

if (!function_exists('__')) {
    function __($text, $domain = 'default') {
        return $text;
    }
}

if (!function_exists('_e')) {
    function _e($text, $domain = 'default') {
        echo $text;
    }
}

if (!function_exists('get_bloginfo')) {
    function get_bloginfo($show = '') {
        switch ($show) {
            case 'name':
                return 'Samarieši@Med4You';
            case 'description':
                return 'Paliatīvās aprūpes pakalpojumi';
            case 'charset':
                return 'UTF-8';
            default:
                return 'Samarieši@Med4You';
        }
    }
}

if (!function_exists('is_front_page')) {
    function is_front_page() {
        return true;
    }
}

if (!function_exists('is_home')) {
    function is_home() {
        return true;
    }
}

if (!function_exists('wp_get_theme')) {
    function wp_get_theme() {
        return (object) array('Name' => 'Samariesi Med4U Theme');
    }
}

if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        // This function was introduced in WordPress 5.2
        // For compatibility, we just echo nothing or a comment
        echo '<!-- wp_body_open -->';
    }
}

if (!function_exists('wp_create_nonce')) {
    function wp_create_nonce($action = -1) {
        // Simple nonce replacement for standalone mode
        return wp_hash($action . '|' . time(), 'nonce');
    }
}

if (!function_exists('wp_hash')) {
    function wp_hash($data, $scheme = 'auth') {
        // Simple hash function replacement
        return hash('sha256', $data . 'samariesi_salt');
    }
}

if (!function_exists('admin_url')) {
    function admin_url($path = '') {
        return home_url('/wp-admin/' . $path);
    }
}

if (!function_exists('is_page')) {
    function is_page() {
        return true;
    }
}

if (!function_exists('get_permalink')) {
    function get_permalink() {
        return $_SERVER['REQUEST_URI'];
    }
}

if (!function_exists('apply_filters')) {
    function apply_filters($tag, $value) {
        return $value;
    }
}

// Simple Walker_Nav_Menu replacement
if (!class_exists('Walker_Nav_Menu')) {
    class Walker_Nav_Menu {
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            // Simple fallback
        }
    }
}

if (!function_exists('apply_filters')) {
    function apply_filters($tag, $value) {
        return $value;
    }
}



// Simple Walker_Nav_Menu replacement
if (!class_exists('Walker_Nav_Menu')) {
    class Walker_Nav_Menu {
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            // Simple fallback
        }
    }
}



// Include this file at the beginning of each PHP file
?>