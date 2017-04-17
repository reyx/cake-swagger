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
use function compact;
use Swagger\Annotations\Swagger;

class UiController extends AppController
{
	
	/**
	 * @param Event $event
	 * @return \Cake\Http\Response|null|void
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		if ($this->request->getParam('action') === 'json') {
			$this->autoRender = false;
		}
	}
	
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
		$url = (count(Configure::read('cake-swagger.directory')) === 0) ?
			Configure::read('cake-swagger.default.json') :
			['plugin' => 'CakeSwagger', 'controller' => 'Ui', 'action' => 'json'];
		
		$this->set(compact('url'));
	}
	
	/**
	 * Generate a swagger json
	 *
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function json()
	{
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
		$options = [];
		if (Configure::read('cake-swagger.analyser') !== false) {
			$options['analyser'] = Configure::read('cake-swagger.analyser');
		}
		if (Configure::read('cake-swagger.analysis') !== false) {
			$options['analysis'] = Configure::read('cake-swagger.analysis');
		}
		if (Configure::read('cake-swagger.processors') !== false) {
			$options['processors'] = Configure::read('cake-swagger.processors');
		}
		if (!empty(Configure::read('cake-swagger.exclude'))) {
			$options['exclude'] = Configure::read('cake-swagger.exclude');
		}
		
		return \Swagger\scan(Configure::read('cake-swagger.directory'), $options);
	}
	
}