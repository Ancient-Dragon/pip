<?php

class Main extends Controller {

    /**
     * Loads all the necessary models, before getting the first 4 recipes (for now this will do) before getting all the
	 * users associated with those recipes. Then passes the recipes and users onto the view.
     */
    function index()
	{
		$recipeModel = $this->loadModel('recipe');
		$userModel = $this->loadModel('user');
		$sessionHelper = $this->loadHelper('session_helper');
		$recipes = $recipeModel->getRecipes(4);
		$users = array();
		foreach ($recipes as $recipe) {
			$users[] = $userModel->getUser('id', $recipe->getUserId());
		}
        $template = $this->loadView('main_view');
        $template->set('page', ['loggedIn' => $this->checkAuth($userModel, $sessionHelper), 'recipes' => $recipes, 'users' => $users]);
		$template->render();
	}
    
}

?>
