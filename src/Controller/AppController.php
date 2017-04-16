<?php

namespace CakeSwagger\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
	
	/**
	 * @param Event $event
	 * @return \Cake\Http\Response|null|void
	 */
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
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
