<?php

class Main extends Controller {
	
	
	
	function index()
	{
		$session = $this->loadHelper('session_helper');
		$userModel = $this->loadModel('user');
		$pageModel = $this->loadModel('Page_model');
		$pagecontent = $pageModel->get('/');
		
		$template = $this->loadView('main_view');
		if(!is_null($session->get('id'))) {
			if($userModel->checkAuth($session->get('id'))) {
				$loggedIn = true;
			}
        } else {
			$loggedIn = false;
		}
		$template->set('page', ['loggedIn' => $loggedIn]);
		$template->render();
	}
    
}

?>
