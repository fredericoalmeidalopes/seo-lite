# SEO Lite 

Um plugin WordPress simples e leve que analisa páginas e artigos para
fornecer uma pontuação SEO rápida, apresentando barras de desempenho no
painel de administração.

## 🚀 Funcionalidades

-   Análise rápida de conteúdos (posts e páginas).
-   Cálculo de pontuação SEO com base em critérios essenciais.
-   Exibição de barras indicadoras no dashboard do WordPress.
-   Notificações administrativas úteis.
-   Código modular e extensível.

## 📂 Estrutura do Plugin

    seo-lite-bars/
    ├── seo-lite.php
    ├── src/
    │   ├── Core/
    │   │   ├── Scanner.php
    │   │   ├── ScoreCalculator.php
    │   ├── Notifications/
    │   │   └── AdminNotice.php
    │   ├── Admin/
    │   │   ├── Menu.php
    │   │   ├── DashboardPage.php
    │   └── Upsell/
    │       └── UpsellMessage.php
    ├── assets/
    │   ├── css/admin.css
    │   └── js/admin.js

## 🛠️ Instalação

1.  Descompacte o ficheiro do plugin.
2.  Coloque a pasta `seo-lite-bars` dentro de `/wp-content/plugins/`.
3.  Aceda ao painel WordPress → Plugins.
4.  Ative **SEO Lite Bars**.

## 📘 Como Funciona

-   O plugin faz o scan do conteúdo através do `Scanner.php`.
-   A pontuação é calculada pelo `ScoreCalculator.php`.
-   O dashboard do plugin apresenta barras de desempenho geradas no
    administrador.
-   Notificações e mensagens adicionais são geridas em `AdminNotice.php`
    e `UpsellMessage.php`.

## 🧩 Desenvolvimento

O plugin é estruturado de forma modular para facilitar contribuições e
extensões.

### Carregamento automático

Todos os ficheiros em `src/` são carregados automaticamente pelo plugin
principal `seo-lite.php`.

### Scripts e estilos

-   CSS: `assets/css/admin.css`
-   JS: `assets/js/admin.js`

## 📄 Licença

Distribuído sem garantia, para uso livre conforme a licença incluída
(caso aplicável).

------------------------------------------------------------------------

Para sugestões ou melhorias, basta contactar o autor ou submeter
alterações na versão de desenvolvimento.
