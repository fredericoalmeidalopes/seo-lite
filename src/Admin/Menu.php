<?php
namespace SEO\Lite\Admin;
class Menu {
    public function init(){ add_action('admin_menu', [$this,'registerMenu']); }
    public function registerMenu(){
        add_menu_page(__('SEO Lite','seo-lite'), __('SEO Lite','seo-lite'), 'manage_options',
            'seo-lite-dashboard', [$this,'renderDashboard'], 'dashicons-chart-area', 80);
    }
    public function renderDashboard(){ $dashboard = new DashboardPage(); $dashboard->render(); }
}
