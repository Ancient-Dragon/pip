<?php
class My_Recipes extends Controller {

    /**
     * Loads models and helpers, if the user is not authenticated it will redirect them to login. If they are logged in
     * then it fetches all the recipes created by that user and passes this data to the view.
     */
    function index()
    {
        $userModel = $this->loadModel('user');
        $sessionHelper = $this->loadHelper('session_helper');
        if (!$this->checkAuth($userModel, $sessionHelper)) {
            $this->redirect('auth/login');
        } else {
            $recipeModel = $this->loadModel('recipe');
            $sessionModel = $this->loadModel('session');
            $user_id = $sessionModel->query("SELECT * FROM `sessions` WHERE `id` = '" . $sessionHelper->get('id') . "' LIMIT 1", 'session_helper', 1)->user_id;
            $user = $userModel->query("SELECT * FROM `users` WHERE `id` = " . $user_id . " LIMIT 1", 'user', 1);
            $recipes = $recipeModel->getRecipes(0, $user_id);

            $template = $this->loadView('my_recipes');
            $template->set('page', ['loggedIn' => $this->checkAuth($userModel, $sessionHelper), 'recipes' => $recipes, 'user' => $user]);
            $template->render();
        }
    }
}

?>