<?php

class Auth extends Controller
{

    /**
     * Loads required models and helpers, before checking whether the user is logged in, if they are redirects them to
     * the homepage, if there is post data set, then it will try to create a new user account, otherwise displays
     * the registration page.
     */
    function register()
    {
        $user = $this->loadModel( 'user');
        $session = $this->loadHelper('session_helper');
        if ($this->checkAuth($user, $session)) {
            $this->redirect('');
        } else if (isset($_POST['email']) && isset($_POST['confirm_email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user->create($email, $password);
            $this->redirect('auth/login');
        } else {
            $template = $this->loadView('registration');
            $template->render();
        }
    }

    /**
     * Loads required models, then checks whether the user is already authenticated redirecting them if they are. However,
     * if there is post data set it will then try and find the user, before checking the password of that user. If the
     * password is valid, then it creates a session id, using the datetime and then hashes it (not the most secure
     * but will do for now) before setting and adding the session id to the database. If there is no post data, it
     * will simply load the login view.
     */
    function login()
    {
        $user = $this->loadModel( 'user');
        $sessionHelper = $this->loadHelper('session_helper');
        if ($this->checkAuth($user, $sessionHelper)) {
            $this->redirect('');
        } else if (isset($_POST['email']) && isset($_POST['password'])) {
            $foundUser = $user->getUser('email', $_POST['email']);
            if (!is_null($foundUser)) {
                if ($foundUser->checkPassword($_POST['password'], $foundUser->getPassword())) {
                    $session = $this->loadModel('session');
                    $time = new DateTime();
                    $sess_id = md5($time->getTimestamp());
                    $sessionHelper->set('id', $sess_id);
                    $session->execute("INSERT INTO `sessions` (`id`, `user_id`) VALUES ('" . $sess_id . "','" . $foundUser->getId() . "')");
                    $this->redirect('');
                } else {
                    $template = $this->loadView('login');
                    $template->render();
                }
            }
        } else {
            $template = $this->loadView('login');
            $template->render();
        }
    }

    /**
     * This method simply, checks the user is logged in. If they are then it will load required models and then
     * find the session id and delete it from the database and then destroy the session before redirecting the user.
     */
    function logout()
    {
        $user = $this->loadModel( 'user');
        $sessionHelper = $this->loadHelper('session_helper');
        if (!$this->checkAuth($user, $sessionHelper)) {
            $this->redirect('auth/login');
        } else {
            $session = $this->loadModel('session');
            $sess_id = $sessionHelper->get('id');
            $session->execute('DELETE FROM `sessions` WHERE `id` = "' . $sess_id . '"');
            $sessionHelper->destroy();
            $this->redirect('auth/login');
        }
    }
}

?>