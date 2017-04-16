<?php

namespace CakeSwagger\Controller;

use App\Controller\AppController as BaseController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Filesystem\File;
use CakeSwagger\Exception\CakeSwaggerException;

class AppController extends BaseController
{
	
	/**
	 * @param Event $event
	 * @return \Cake\Http\Response|null|void
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Require a config file
		$config = new File(Configure::read('swagger.default.config.file'));
		if (!$config->exists()) {
			throw new CakeSwaggerException('File cake-swagger.php is required.');
		}
		$this->viewBuilder()->setLayout('CakeSwagger.default');
	}
	
	/**
	 * @param Event $event
	 * @return \Cake\Network\Response|null|void
	 */
	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
		if ($this->request->getParam('action') === 'index') {
			$this->RequestHandler->respondAs('html');
		}
	}
}
