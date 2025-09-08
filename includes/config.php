<?php
/**
 * Basic configuration for standalone hospice care website
 */

// Site configuration
define('SITE_NAME', 'Samarieši@Med4You');
define('SITE_DESCRIPTION', 'Paliatīvā aprūpe mājās - Rīgā un Vidzemē');
define('SITE_URL', 'http://localhost:5000');

// Contact information
define('CONTACT_EMAIL_RIGA', 'riga@med4you.lv');
define('CONTACT_EMAIL_VIDZEME', 'vidzeme@med4you.lv');
define('CONTACT_PHONE_RIGA', '+37128017600');
define('CONTACT_PHONE_VIDZEME', '+37125762922');

// Emergency contact
define('EMERGENCY_PHONE', '+37128017600');

// Basic utility functions
function get_site_url($path = '') {
    return SITE_URL . ($path ? '/' . ltrim($path, '/') : '');
}

function get_asset_url($asset) {
    return get_site_url($asset);
}

function escape_html($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function get_page_title($page = '') {
    $title = SITE_NAME;
    if ($page) {
        $title = $page . ' - ' . $title;
    }
    return $title;
}

// Navigation menu
function get_navigation_menu() {
    return [
        'Sākums' => 'index.php',
        'Pakalpojumi' => 'pakalpojums.php',
        'Par mums' => 'komanda.php',
        'Atsauksmes' => 'atsauksmes.php',
        'Ziedojumi' => 'ziedojumi.php',
        'Vakances' => 'vakances.php',
        'Brīvprātīgo darbs' => 'brivpratigo-darbs.php'
    ];
}

// Current page detection
function get_current_page() {
    $script_name = basename($_SERVER['SCRIPT_NAME']);
    return $script_name === 'index.php' ? '' : str_replace('.php', '', $script_name);
}
?>