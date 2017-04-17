<?php
$script = '
window.onload = function() {
    // Build a system
    const ui = SwaggerUIBundle({
        url: "' . (is_array($url) ? $this->Url->build($url, ['fullBase' => true]) : $url) . '",
        dom_id: "#swagger-ui",
        presets: [SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset],
        plugins: [SwaggerUIBundle.plugins.DownloadUrl],
        layout: "StandaloneLayout"
    });
    window.ui = ui;
}
';
?>
<?= $this->Html->scriptBlock($script, ['block' => true]) ?>
<div id="swagger-ui"></div>
