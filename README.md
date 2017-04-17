# cake-swagger

[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.txt)

`CakePHP 3.x` plugin that dinamically adds auto-generated Swagger documentation to your projects using `swagger-php` and `swagger-ui 3.x`

## Requirements

* CakePHP 3.0+
* Some [swagger-php](https://github.com/zircote/swagger-php) annotation knowledge

## Installation

1. Install the plugin using composer:

    ```bash
    composer require aymard-pro/cake-swagger:dev-master
    ```

2. To enable the plugin either run the following command:

    ```bash
    bin/cake plugin load CakeSwagger --routes --bootstrap
    ```

    or manually add the following line to your `config/bootstrap.php` file:

    ```bash
    Plugin::load('CakeSwagger', ['routes' => true, 'bootstrap' => true]);
    ```

3. Create the configuration file `/config/cake-swagger.php` if not exists. See #Configuration section

4. Browsing to `http://your_app_uri/api/ui` should now produce the
[Swagger-UI](http://petstore.swagger.io/) interface:

    ![Default UI index](http://2434zd29misd3e4a4f1e73ki.wpengine.netdna-cdn.com/wp-content/uploads/2017/04/swagger-UI-e1491843286926.png)

## Configuration

All configuration for this plugin is done through the `/config/cake-swagger.php`
configuration file. Full example below.

```php
<?php

return [
	'CakeSwagger' => [
		'ui' => [
			'title' => 'CakePHP Swagger plugin'
		],
		'route' => [
			'path' => '/api'
		],
		'directory' => [],
		'exclude' => []
	]
];
```

## Additional Reading

- [The Swagger Specification](https://github.com/swagger-api/swagger-spec)
- [PHP Annotation Examples](https://github.com/zircote/swagger-php/tree/master/Examples)
- [Swagger Document Checklist](http://apievangelist.com/2015/06/15/my-minimum-viable-definition-for-a-complete-swagger-api-definition/)

## Contribute

I'm trying to make this plugin very testable for the community. Your ideas and suggestions are welcome.
[Create an issue here.](https://github.com/aymard-pro/cake-swagger/issues/new)

## NB

This plugin was originally forked from [alt3/cakephp-swagger](https://github.com/alt3/cakephp-swagger) based on the `Swagger-UI 2.2.3`