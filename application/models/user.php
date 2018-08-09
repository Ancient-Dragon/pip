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
        $this->insert("INSERT INTO users (`email`, `password`) VALUES ('" . $this->email . "','" . $this->password ."')");
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function getUser($email) {
        $email = $this->escapeString($email);
        $result = $this->query('SELECT * FROM users WHERE email="'. $email .'"', 'user', 1);
        return $result;
    }

    public function checkPassword($password) {
        password_verify($password, PASSWORD_ARGON2I);
        return true;
    }
}

?>
