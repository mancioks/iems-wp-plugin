<?php

/**
 * @package IemsPlugin
 */

/**
 * Plugin Name:       IEMS
 * Plugin URI:        https://iems.bnvi.lt
 * Description:       IEMS client
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mantas Kryževičius
 * Author URI:        https://svako.lt
 * Text Domain:       iems-wp
 */

if (!defined('ABSPATH')) {
	die;
}

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

define('IEMS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('IEMS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('IEMS_BASENAME', plugin_basename(__FILE__));
define('IEMS_ENDPOINT', 'http://localhost:8000/api/init');

function activate_iems_plugin() {
	\Inc\Base\Activate::activate();
}

function deactivate_iems_plugin() {
	\Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_iems_plugin');
register_deactivation_hook(__FILE__, 'deactivate_iems_plugin');

if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}