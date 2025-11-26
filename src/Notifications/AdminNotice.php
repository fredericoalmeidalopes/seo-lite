<?php
namespace SEO\Lite\Notifications;
class AdminNotice { public function init(){ add_action('admin_notices',[$this,'showNotice']); add_action('admin_init', [$this, 'dismissNotice']); }
    public function showNotice(){
        // Verifica se o utilizador já dispensou a notificação
        if (get_user_meta(get_current_user_id(), 'seo_lite_conversion_notice_dismissed', true)) {
            return;
        }

        // URL para dispensar a notificação
        $dismiss_url = add_query_arg([
            'seo_lite_dismiss_notice' => 1,
            'nonce' => wp_create_nonce('seo_lite_dismiss_notice_nonce')
        ]);

        // Estrutura da notificação de conversão
        echo '<div class="seo-lite-conversion-notice">';
        echo '<div class="seo-lite-conversion-notice-content">';
        echo '<h3 class="seo-lite-conversion-notice-title">' . esc_html__('O desempenho SEO do seu site está a ser prejudicado!', 'seo-lite') . '</h3>';
        echo '<p class="seo-lite-conversion-notice-description">' . esc_html__('Está a perder tráfego valioso e oportunidades de ranking porque funcionalidades críticas de otimização não estão ativas. Instale o SEO Pro e desbloqueie todas as melhorias automáticas que o seu site necessita para competir no Google.', 'seo-lite') . '</p>';
        echo '</div>';
        echo '<div class="seo-lite-conversion-notice-actions">';
        // Botão para o Painel de Opções (Assumindo que o slug do menu é 'seo-lite-dashboard')
        echo '<a href="' . esc_url(admin_url('admin.php?page=seo-lite-dashboard')) . '" class="button button-secondary">' . esc_html__('Ver problemas de SEO', 'seo-lite') . '</a>';
        // Botão para a Versão PRO
        echo '<a href="https://seo-pt.pt/" target="_blank" class="button button-primary">' . esc_html__('Ativar SEO Pro Agora', 'seo-lite') . '</a>';
        echo '</div>';
        // Botão para dispensar
        echo '<a href="' . esc_url($dismiss_url) . '" class="dismiss-button">' . esc_html__('Dispensar', 'seo-lite') . '</a>';
        echo '</div>';
    }

    // Adicionar a lógica para dispensar a notificação
    public function dismissNotice() {
        if (isset($_GET['seo_lite_dismiss_notice']) && isset($_GET['nonce']) && wp_verify_nonce($_GET['nonce'], 'seo_lite_dismiss_notice_nonce')) {
            update_user_meta(get_current_user_id(), 'seo_lite_conversion_notice_dismissed', true);
            // Redirecionar para remover os parâmetros da URL
            wp_safe_redirect(remove_query_arg(['seo_lite_dismiss_notice', 'nonce']));
            exit;
        }
    }

    
}
