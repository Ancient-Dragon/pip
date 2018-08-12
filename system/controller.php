<?php

class Controller {


    public function loadModel($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name)
	{
		$view = new View($name);
		return $view;
	}
	
	public function loadPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}
	
	public function loadHelper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)
	{
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}

    /**
     * @param $userModel
     * @param $session
     *
     * As every controller requires the ability to check authentication, the method here, checks whether the session
     * id can be found and then if it is then uses the user model's checkAuth method to determine whether there is a
     * valid user.
     *
     * @return bool
     */
    public function checkAuth($userModel, $session) {

        if(!is_null($session->get('id'))) {
            if($userModel->checkAuth($session->get('id'))) {
                return true;
            }
        } else {
            return false;
        }
    }
}

?>