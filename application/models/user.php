<?php

class User extends Model {

    private $id;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $email
     * @param $password
     */
    public function __construct() {
        parent::__construct();
    }

    public function create($email, $password) {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_ARGON2I);
        $this->execute("INSERT INTO users (`email`, `password`) VALUES ('" . $this->email . "','" . $this->password ."')");
    }

    public function getId() {
        return $this->id;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function getUser($email) {
        $email = $this->escapeString($email);
        $result = $this->query('SELECT * FROM users WHERE email="'. $email .'" LIMIT 1', 'user', 1);
        return $result;
    }

    public function checkPassword($password) {
        password_verify($password, PASSWORD_ARGON2I);
        return true;
    }

    public function checkAuth($session) {
        $user_id = $this->query("SELECT * FROM `sessions` WHERE `id` = '". $session . "' LIMIT 1", 'session_helper', 1)->user_id;
        $user = $this->query("SELECT * FROM `users` WHERE `id` = " . $user_id . " LIMIT 1", 'user', 1);
        if(is_null($user)) {
            return false;
        } else {
            return true;
        }
    }
}

?>
