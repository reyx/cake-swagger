<?php
/**
 * Created by PhpStorm.
 * User: aymard.pro
 * Date: 15/04/2017
 * Time: 21:44
 */

namespace CakeSwagger\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use CakeSwagger\Controller\AppController;
use CakeSwagger\Exception\CakeSwaggerException;
use Swagger\Annotations\Swagger;

class UiController extends AppController
{
	
	/**
	 * @param Event $event
	 *
	 * @return \Cake\Network\Response|null|void
	 */
	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
		if ($this->request->getParam('action') === 'json') {
			$this->RequestHandler->renderAs($this, 'json');
		}
	}
	
	public function index()
	{
	
	}
	
	/**
	 * Generate swagger json
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function json()
	{
		$this->autoRender = false;
		echo $this->scan();
	}
	
	/**
	 * Scan directories for build swagger documentation
	 *
	 * @return Swagger
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	private function scan(): Swagger
	{
		if (!is_array(Configure::read('swagger.directories'))) {
			throw new CakeSwaggerException('Directories option must be an array');
		}
		return \Swagger\scan(Configure::read('swagger.directories'));
	}
	
}