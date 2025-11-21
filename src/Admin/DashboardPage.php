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

        echo '<div class="wrap seo-lite-dashboard">';
        echo '<h1>SEO Lite - Painel de Análise</h1>';
        echo '<div class="cards">';

        // Card Resumo com explicações técnicas
        echo '<div class="card">';
        echo '<h2>Resumo da Análise</h2>';
        echo '<p>Problemas totais: <strong>' . $errors . '</strong></p>';
        echo '<p>Erros linguísticos: <strong>' . $languageErrors . '</strong></p>';
        if ($schemaError) {
            echo '<p class="critical">Erro crítico no schema do território!</p>';
            echo '<p class="details">Inconsistência no Schema.org (<code>LocalBusiness</code>/<code>Place</code>) com dados JSON-LD incompletos (geocoordenadas, <code>address</code>, <code>areaServed</code>). Impacto: perda de relevância semântica, menor visibilidade em rich results e pacotes locais. Corrija com a versão PRO para normalizar marcação e reforçar E-E-A-T.</p>';
        }
        echo '<p class="details">Erros linguísticos afetam legibilidade, UX, CTR e SEO semântico. Corrija para melhorar ranking e experiência do utilizador.</p>';
        echo '</div>';

        // Card Pontuação com barras
        echo '<div class="card">';
        echo '<h2>Pontuação SEO</h2>';
        echo '<div class="bar"><span style="width:' . $current . '%;background:' . ($current>=80?'#46b450':($current>=50?'#ffb900':'#dc3232')) . '">' . $current . '% Atual</span></div>';
        echo '<div class="bar"><span style="width:' . $potential . '%;background:' . ($potential>=80?'#46b450':($potential>=50?'#ffb900':'#dc3232')) . '">' . $potential . '% Com PRO</span></div>';
        echo '</div>';

        // Card Upgrade
        echo '<div class="card upgrade">';
        echo '<h2>Melhore o seu SEO</h2>';
        echo '<p>Corrija erros críticos e aumente a sua pontuação com a versão PRO.</p>';
        echo '<a class="button button-primary button-large" href="https://github.com/fredericoalmeidalopes/seo-pt/" target="_blank">Upgrade para PRO</a>';
        echo '</div>';

        echo '</div>'; // cards
        echo '</div>'; // wrap
    }
}
