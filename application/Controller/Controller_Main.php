<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		$model_pages = $this->loadModel('Pages');
		echo $this->view->render('main_view.php');
	}

	function action_error404()

	{
		echo $this->view->render('Main/error404.php');
	}

	function action_staticPage($slug)
	{	
		$model_pages = $this->loadModel('Pages');
		$result = $model_pages->getPage($slug);
		if(!$result)
			$this->stopAndRedirect($this->router->generate('error404'));
		echo $this->view->render('Main/static_page.php',  array('page' => $result));
	}

	
	function action_encryption($slug)
	{	
		$model_pages = $this->loadModel('Pages');
		if($_SESSION['link'] == $slug)
			$result['content'] = 'Контент доступный только по данной ссылке, 
		Причем текущая ссылка будет работать только для данного пользователя, 
		при попытке перейти по ней у дрогого пользователя ничего не получиться!';
		else 
			$result = false;
		if(!$result)
			$this->stopAndRedirect($this->router->generate('error404'));
		echo $this->view->render('Main/static_page.php',  array('page' => $result));
	}

}