<?php
class Auth extends Controller {
    function register()
    {
        if (isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password']) )
        {
            $user = $this->loadModel('user');
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user->create($email, $password);
            header("Location: " . BASE_URL . "auth/login");
            exit;
        } else {
            $template = $this->loadView('registration');
            $template->render();
        }
    }

    function login()
    {
        if (isset($_POST['email'])&& isset($_POST['password']))
        {
            $user = $this->loadModel('user');
            $foundUser = $user->getUser($_POST['email']);
            if(!is_null($foundUser)) {
                if($foundUser->checkPassword($_POST['password'])) {

                }
            }
        } else {
            $template = $this->loadView('login');
            $template->render();
        }
    }

}

?>