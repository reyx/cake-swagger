<?php
/**
 * Created by PhpStorm.
 * User: aymard.pro
 * Date: 15/04/2017
 * Time: 21:40
 */

use Cake\Core\Configure;

/*
 * Load app-specific configuration file
 */
$config = 'cake-swagger';
$configPath = CONFIG . $config . '.php';
if (file_exists($configPath)) {
	Configure::load($config, 'default');
}
