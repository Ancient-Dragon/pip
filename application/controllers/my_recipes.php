<?php
class My_Recipes extends Controller {

    function index()
    {
        $template = $this->loadView('my_recipes');
        $template->render();
    }
}

?>