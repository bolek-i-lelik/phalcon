<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

	public function indexAction()
	{

	}

	public function registerAction()
	{
		$users = new Users();

		//Сохраняем и проверяем на наличие ошибок
		$success = $users->save(
			$this->request->getPost(),
			[
				'name',
				'email',
			]
		);

		if ($success){
			echo 'Спасибо за регистрацию';
		}
		else{
			echo 'К сожалению, возникли следующие проблемы: ';

			$messages = $users->getMessages();
			foreach($messages as $message){
				echo $message->getMessage().'<br/>';
			}
		}

		$this->view->disable();

	}

}