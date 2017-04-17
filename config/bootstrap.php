<?php
/**
 * Created by PhpStorm.
 * User: aymard.pro
 * Date: 15/04/2017
 * Time: 21:40
 */

use Cake\Core\Configure;

Configure::write('cake-swagger.default.config.file', CONFIG . 'cake-swagger.php');
Configure::write('cake-swagger.default.json', 'http://petstore.swagger.io/v2/swagger.json');
