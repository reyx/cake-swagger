<?php

use Cake\Core\Configure;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
	'CakeSwagger',
	['path' => Configure::read('CakeSwagger.route.path')],
	function (RouteBuilder $routes) {
		$routes->fallbacks(DashedRoute::class);
	}
);
