<?php

class Session extends Model {

    private $id;
    private $uid;

    public function getId() {
        return $this->id;
    }

    public function getUid() {
        return $this->uid;
    }
}