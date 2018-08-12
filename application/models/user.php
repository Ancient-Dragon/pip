<?php

class User extends Model {

    private $id;
    private $email;
    private $password;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $this->escapeString($email);
    }

    /**
     * @param $password
     *
     * Ensures password is hashed before it is set.
     */
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    /**
     * @param $email
     * @param $password
     *
     * Sets the email and password, using the setters. Before inserting the data into the users table.
     */
    public function create($email, $password) {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->execute("INSERT INTO users (`email`, `password`) VALUES ('" . $this->email . "','" . $this->password ."')");
    }

    /**
     * @param string $column
     * @param $value
     *
     * Get's a single user from the database, by taking the column to search for, as it could be email or id depending
     * what method calls it.
     *
     * @return array|object|stdClass
     */
    public function getUser($column = 'email', $value) {
        $column = $this->escapeString($column);
        $value = $this->escapeString($value);
        $result = $this->query('SELECT * FROM users WHERE '. $column . '="'. $value .'" LIMIT 1', 'user', 1);
        return $result;
    }

    /**
     * @param $password
     *
     * Checks whether the passed password, matches the stored password.
     *
     * @return bool
     */
    public function checkPassword($password, $hashedPassword) {
        if(password_verify($password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $session
     *
     * Method takes the session id, and checks whether the id can be found, if it can then it will find the user, and
     * if a user can be found then it will return true.
     *
     * @return bool
     */
    public function checkAuth($session) {
        $user_id = $this->query("SELECT * FROM `sessions` WHERE `id` = '". $session . "' LIMIT 1", 'session_helper', 1)->user_id;
        $user = $this->query("SELECT * FROM `users` WHERE `id` = " . $user_id . " LIMIT 1", 'user', 1);
        if(!is_null($user)) {
            return true;
        } else {
            return false;
        }
    }
}

?>
