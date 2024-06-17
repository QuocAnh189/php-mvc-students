<?php

class HomeController {
    protected $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function index() {
        echo "Welcome to the Home Page!";
    }
}
