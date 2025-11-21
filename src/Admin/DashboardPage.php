<?php
namespace SEO\Lite\Admin;
use SEO\Lite\Core\Scanner; use SEO\Lite\Core\ScoreCalculator;

class DashboardPage {
    public function render(){
        $scanner = new Scanner();
        $errors = $scanner->getTotalErrors();
        $languageErrors = $scanner->getLanguageErrors();
        $schemaError = $scanner->hasSchemaError();
        $score = new ScoreCalculator($errors);
        $current = $score->getCurrentScore();
        $potential = $score->getPotentialScore();
        echo '<div class="wrap">';
        echo '<h1>' . esc_html__('SEO Lite - Análise Simplificada','seo-lite') . '</h1>';
        echo '<p>' . sprintf(__('Foram detetados %d problemas que estão a prejudicar o ranking deste site.','seo-lite'), $errors) . '</p>';
        echo '<p>' . sprintf(__('Erros linguísticos encontrados: %d','seo-lite'), $languageErrors) . '</p>';
        if ($schemaError) {
            echo '<div style="background:#ffecec;border:1px solid #ff0000;padding:10px;margin:15px 0;">';
            echo '<strong>' . esc_html__('Erro crítico no schema do território!','seo-lite') . '</strong>';
            echo '<p>' . esc_html__('Inconsistência no Schema.org LocalBusiness/Place com geocoordenadas/endereçamento. Impacto: perda de relevância semântica, menor visibilidade em pacotes locais e rich results. Corrija com a versão PRO para normalizar JSON-LD (address, geo, areaServed) e reforçar E-E-A-T.','seo-lite') . '</p>';
            echo '</div>';
        }
        echo '<h2>' . esc_html__('Pontuação SEO','seo-lite') . '</h2>';
        echo '<p>' . sprintf(__('SEO Score Atual: %d/100','seo-lite'), $current) . '</p>';
        echo '<p>' . sprintf(__('Pontuação com Versão Pro: %d/100','seo-lite'), $potential) . '</p>';
        echo '<div style="margin-top:20px;padding:15px;background:#f9f9f9;border:1px solid #ddd;border-radius:6px;text-align:center;">';
        echo '<p style="font-size:16px;font-weight:bold;color:#333;margin-bottom:10px;">' . esc_html__('✅ Corrija erros críticos e melhore o ranking com a versão PRO','seo-lite') . '</p>';
        echo '<a class="seo-lite-upgrade-btn" href="https://github.com/fredericoalmeidalopes/seo-pt/" target="_blank">' . esc_html__('Saiba como resolver → Versão PRO','seo-lite') . '</a>';
        echo '</div>';
        echo '</div>';
    }
}
