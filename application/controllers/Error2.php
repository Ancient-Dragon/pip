<?php

class Error2 extends Controller {
    public function index() {
        $template = $this->loadView('404');
        $template->render();
    }
}
?>