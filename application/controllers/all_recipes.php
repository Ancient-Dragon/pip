<?php
class All_Recipes extends Controller {

    /**
     * Loads the required models and session helper, before getting all the recipes, and then loading all the users
     * who have created recipes, before passing all this data to the view.
     */
    function index()
    {
        $recipeModel = $this->loadModel('recipe');
        $userModel = $this->loadModel('user');
        $sessionHelper = $this->loadHelper('session_helper');
        $recipes = $recipeModel->getRecipes();
        $users = array();
        foreach ($recipes as $recipe) {
            $users[] = $userModel->getUser('id', $recipe->getUserId());
        }

        $template = $this->loadView('all_recipes');
        $template->set('page', ['loggedIn' => $this->checkAuth($userModel, $sessionHelper), 'recipes' => $recipes, 'users' => $users]);
        $template->render();
    }
}

?>