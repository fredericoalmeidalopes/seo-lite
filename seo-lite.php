<?php
/**
 * Plugin Name: SEO Lite
 * Plugin URI: https://github.com/fredericoalmeidalopes/seo-pt/
 * Description: Scanner simplificado para SEO e linguagem, com pontuação e upsell para versão PRO.
 * Version: 3.1.0
 * Author: Frederico Lopes
 * Author URI: https://github.com/fredericoalmeidalopes/
 * License: GPL2
 * Text Domain: seo-lite
 */

if (!defined('ABSPATH')) { exit; }

require_once plugin_dir_path(__FILE__) . 'src/Admin/Menu.php';
require_once plugin_dir_path(__FILE__) . 'src/Admin/DashboardPage.php';
require_once plugin_dir_path(__FILE__) . 'src/Core/Scanner.php';
require_once plugin_dir_path(__FILE__) . 'src/Core/ScoreCalculator.php';
require_once plugin_dir_path(__FILE__) . 'src/Notifications/AdminNotice.php';
require_once plugin_dir_path(__FILE__) . 'src/Upsell/UpsellMessage.php';

add_action('init', function(){
    load_plugin_textdomain('seo-lite', false, dirname(plugin_basename(__FILE__)) . '/languages');
});

use SEO\Lite\Admin\Menu;
use SEO\Lite\Notifications\AdminNotice;

add_action('plugins_loaded', function(){
    $menu = new Menu();
    $menu->init();
    $notice = new AdminNotice();
    $notice->init();
});
