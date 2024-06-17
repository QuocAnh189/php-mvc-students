<?php

class StudentModel {
    private $id;
    private $username;
    private $password;
    private $role;

    public function __construct($id = null, $username = null, $password = null, $role = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserName() {
        return $this->username;
    }

    public function setUsrName($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function __toString() {
        return "Student [ID: $this->id, username: $this->username, password: $this->password, role: $this->role]";
    }
}

?>