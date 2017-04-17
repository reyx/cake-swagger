<?php

namespace CakeSwagger\Controller;

use App\Controller\AppController as BaseController;
use function array_key_exists;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Utility\Hash;
use CakeSwagger\Exception\CakeSwaggerException;

class AppController extends BaseController
{
	
	/**
	 * @var array that will hold merged configuration settings.
	 */
	protected $config = [];
	
	/**
	 * @var array that will hold merged options settings.
	 */
	protected $options = [];
	
	/**
	 * @var array holding required default configuration settings.
	 */
	public static $defaultConfig = [
		'ui' => [
			'title' => 'CakePHP Swagger plugin'
		],
		'route' => [
			'path' => '/api'
		]
	];
	
	/**
	 * Initialize
	 */
	public function initialize()
	{
		parent::initialize();
		
		if (Configure::check('CakeSwagger')) {
			$this->config = Hash::merge(static::$defaultConfig, Configure::read('CakeSwagger'));
		}
		if (array_key_exists('analyser', $this->config)) {
			$this->options['analyser'] = $this->config['analyser'];
		}
		if (array_key_exists('analysis', $this->config)) {
			$this->options['analysis'] = $this->config['analysis'];
		}
		if (array_key_exists('processors', $this->config)) {
			$this->options['processors'] = $this->config['processors'];
		}
		if (array_key_exists('exclude', $this->config)) {
			$this->options['exclude'] = $this->config['exclude'];
		}
	}
	
	/**
	 * @param Event $event
	 * @return \Cake\Http\Response|null|void
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->viewBuilder()->setLayout('CakeSwagger.default');
	}
	
	/**
	 * @param Event $event
	 */
	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
	}
	
}
