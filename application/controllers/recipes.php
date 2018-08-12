<?php

class Recipes extends Controller
{

    /**
     * @param $id
     *
     * This method displays the recipes, by requiring a parameter to get the recipes by id. Once it has the recipe,
     * it then loads all the ingredients associated with that recipe, before passing the data onto the view.
     */
    function view($id)
    {
        $userModel = $this->loadModel('user');
        $sessionHelper = $this->loadHelper('session_helper');
        $template = $this->loadView('recipe');
        $recipeModel = $this->loadModel('recipe');
        $recipe = $recipeModel->getRecipe($id);
        $author = $userModel->getUser('id', $recipe->getUserId());
        $ingredientModel = $this->loadModel('ingredient');
        $ingredients = $ingredientModel->getIngredients($recipe->getId());
        $template->set('page', ['loggedIn' => $this->checkAuth($userModel, $sessionHelper), 'recipe' => $recipe, 'author' => $author, 'ingredients' => $ingredients]);
        $template->render();
    }

    /**
     *
     * Loads all required helpers and models, before checking to see if any post data. If there is then it creates a recipe
     * using that data. Then checks to see if any ingredients were added, if they were it will then create each
     * ingredient, linking it to the recipe just created, before redirecting. If no post data is present, it will
     * simply check the user is authenticated before loading the view.
     */
    function create() {
        $sessionHelper = $this->loadHelper('session_helper');
        $sessionModel = $this->loadModel('session');
        $recipeModel = $this->loadModel('recipe');
        $userModel = $this->loadModel('user');
        $user_id = $sessionModel->query("SELECT * FROM `sessions` WHERE `id` = '". $sessionHelper->get('id') . "' LIMIT 1", 'session_helper', 1)->user_id;
        if(isset($_POST['name']) && isset($_POST['description'])) {
            $recipeModel->create($_POST['name'], $_POST['description'], $user_id);
            $recipe = $recipeModel->query('SELECT * from `recipes` WHERE `id` = (SELECT MAX(id) FROM `recipes`)', 'recipe', 1);
            $ingredientModel = $this->loadModel('ingredient');
            if ($_POST['ingredient1'] !== "" && $_POST['ingredient1Amount'] !== "" ) {
                $ingredientModel->create($_POST['ingredient1'], $_POST['ingredient1Amount'], $recipe->getId());
            } else if ($_POST['ingredient2'] !== "" && $_POST['ingredient2Amount'] !== "" ) {
                $ingredientModel->create($_POST['ingredient2'], $_POST['ingredient2Amount'], $recipe->getId());
            } else if ($_POST['ingredient3'] !== "" && $_POST['ingredient3Amount'] !== "" ) {
                $ingredientModel->create($_POST['ingredient3'], $_POST['ingredient3Amount'], $recipe->getId());
            } else if ($_POST['ingredient4'] !== "" && $_POST['ingredient4Amount'] !== "" ) {
                $ingredientModel->create($_POST['ingredient4'], $_POST['ingredient4Amount'], $recipe->getId());
            } else if ($_POST['ingredient5'] !== "" && $_POST['ingredient5Amount'] !== "" ) {
                $ingredientModel->create($_POST['ingredient5'], $_POST['ingredient5Amount'], $recipe->getId());
            }
            $this->redirect('my_recipes');
        } else if (!$this->checkAuth($userModel, $sessionHelper)) {
            $this->redirect('auth/login');
        } else {
                $template = $this->loadView('create_recipe');
                $template->set('page', ['loggedIn' => $this->checkAuth($userModel, $sessionHelper)]);
                $template->render();
        }
    }
}

?>