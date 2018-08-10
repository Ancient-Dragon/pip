<?php
class All_Recipes extends Controller {

    function index()
    {
        $template = $this->loadView('all_recipes');
        $template->render();
    }
}

?>