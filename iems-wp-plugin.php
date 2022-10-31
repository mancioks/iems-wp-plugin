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

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('BASENAME', plugin_basename(__FILE__));

if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}