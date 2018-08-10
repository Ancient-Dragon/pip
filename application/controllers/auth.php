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
                    $session = $this->loadModel('session');
                    $time = new DateTime();
                    $sess_id = md5($time->getTimestamp());
                    $helper = $this->loadHelper('session_helper');
                    $helper->set('id', $sess_id);
                    //echo "INSERT INTO `sessions` (`id`, `user_id`) VALUES ('" . $sess_id . "','" . $foundUser->getId() ."')";
                    $session->execute("INSERT INTO `sessions` (`id`, `user_id`) VALUES ('" . $sess_id . "','" . $foundUser->getId() ."')");
                    header("Location: " . BASE_URL );
                    exit;
                }
            }
        } else {
            $template = $this->loadView('login');
            $template->render();
        }
    }

    function logout() {
        $session = $this->loadModel('session');
        $sessionHelper = $this->loadHelper('session_helper');
        $sess_id = $sessionHelper->get('id');
        $session->execute('DELETE FROM `sessions` WHERE `id` = "' . $sess_id . '"');
        $sessionHelper->destroy();
        header("Location: " . BASE_URL . "auth/login");
        exit;
    }
}

?>