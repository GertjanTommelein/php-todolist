<?php


class User {
    private $id;
    private $username;

    public function __construct($id, $username){
        $this->id = $id;
        $this->username = $username;
    }

    public function create($id, $username){
        $user = new User($id, $username);
        return $user;
    }

    public function getId(){ return $this->id; }
    public function getUsername(){ return $this->username; }
}

?>