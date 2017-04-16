<?php
use Cake\Core\Configure;

$url = empty(Configure::read('swagger.directories')) ?
	Configure::read('swagger.default.json') :
	$this->Url->build(['plugin' => 'CakeSwagger', 'controller' => 'Ui', 'action' => 'json'], ['fullBase' => true]);

$script = '
window.onload = function() {
    // Build a system
    const ui = SwaggerUIBundle({
        url: "' . $url . '",
        dom_id: "#swagger-ui",
        presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIStandalonePreset
        ],
        plugins: [
            SwaggerUIBundle.plugins.DownloadUrl
        ],
        layout: "StandaloneLayout"
    });
    window.ui = ui;
}
';
echo $this->Html->scriptBlock($script, ['block' => true]);
?>
<div id="swagger-ui"></div>
