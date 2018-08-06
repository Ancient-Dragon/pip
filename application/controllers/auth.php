<?php

class Auth extends Controller {

    function register()
    {
        if (isset($_POST['register']) )
        {
            $email = htmlspecialchars($_POST['register']['email']);

            $user = new User($email, $password);
        } else {
            $template = $this->loadView('registration');
            $template->render();
        }
    }

    function login()
    {
        $template = $this->loadView('login');
        $template->render();
    }

}

?>