<?php
/**
 * Plugin Name: SEO Lite
 * Plugin URI: https://github.com/fredericoalmeidalopes/seo-pt/
 * Description: Scanner simplificado para SEO e linguagem, com pontuação e upsell para versão PRO.
 * Version: 1.0.3
 * Author: Frederico Lopes
 * Author URI: https://github.com/fredericoalmeidalopes/
 * License: GPL2
 * Text Domain: seo-lite
 */

if (!defined('ABSPATH')) { exit; }

spl_autoload_register(function ($class) {
    if (strpos($class, 'SEO\\Lite\\') === 0) {
        $path = str_replace('SEO\\Lite\\', '', $class);
        $path = str_replace('\\', '/', $path);
        $file = plugin_dir_path(__FILE__) . 'src/' . $path . '.php';
        if (file_exists($file)) { require_once $file; }
    }
});

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
