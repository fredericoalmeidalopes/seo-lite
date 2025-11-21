<?php
namespace SEO\Lite\Notifications;
class AdminNotice {
    public function init(){ add_action('admin_notices', [$this,'showNotice']); }
    public function showNotice(){
        echo '<div class="notice notice-warning is-dismissible"><p>';
        echo esc_html__('O seu site apresenta problemas de SEO e linguagem que estão a prejudicar o ranking. Saiba como resolver → ','seo-lite');
        echo '<a href="https://github.com/fredericoalmeidalopes/seo-pt/" target="_blank">' . esc_html__('Versão PRO','seo-lite') . '</a>';
        echo '</p></div>';
    }
}
