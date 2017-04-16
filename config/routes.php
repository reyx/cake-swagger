<?php
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
	'CakeSwagger',
	['path' => '/api/doc'],
	function (RouteBuilder $routes) {
		$routes->fallbacks(DashedRoute::class);
	}
);
