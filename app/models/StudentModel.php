<?php

class StudentModel {
    private $id;
    private $code;
    private $email;
    private $username;
    private $department;
    private $major;

    public function __construct($id = null, $code = null, $email = null , $username = null, $department = null, $major = null) {
        $this->id = $id;
        $this->code = $code;
        $this->email = $email;
        $this->username = $username;
        $this->department = $department;
        $this->major = $major;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getEmail() {
        return $this->code;
    }

    public function setEmail($code) {
        $this->code = $code;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function getMajor() {
        return $this->major;
    }

    public function setMajor($major) {
        $this->major = $major;
    }

    public function __toString() {
        return "Student [ID: $this->id, Code: $this->code, Username: $this->username, Department: $this->department, Major: $this->major]";
    }
}

?>