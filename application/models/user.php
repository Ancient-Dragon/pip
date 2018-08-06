<?php

class User extends Model {

    private $email;
    private $password;

    /**
     * User constructor.
     * @param $email
     * @param $password
     */
    function __construct($email, $password) {
        parent::__construct();
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function get($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM users WHERE url="'. $id .'"');
        return $result;
    }

}

?>
