<?php
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

$config = new File(Configure::read('swagger.default.config.file'));
$path = $config->exists() ? Configure::read('swagger.route.path') : Configure::read('swagger.default.route.path');

Router::plugin(
	'CakeSwagger',
	['path' => $path],
	function (RouteBuilder $routes) {
		$routes->fallbacks(DashedRoute::class);
	}
);
