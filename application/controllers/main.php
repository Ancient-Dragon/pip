<?php

class Main extends Controller {
	
	
	
	function index()
	{
		
		$pageModel = $this->loadModel('Page_model');
		$pagecontent = $pageModel->get('/');
		
		$template = $this->loadView('main_view');
		$template->set('page', $pagecontent);
		$template->render();
	}
    
}

?>
