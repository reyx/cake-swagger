<?php
/**
 * Created by PhpStorm.
 * User: aymard.pro
 * Date: 15/04/2017
 * Time: 21:40
 */

use Cake\Core\Configure;

Configure::write('swagger.title', '');
Configure::write('swagger.route.path', '/api-doc');
Configure::write('swagger.directories', []);
Configure::write('swagger.default.json', 'http://petstore.swagger.io/v2/swagger.json');