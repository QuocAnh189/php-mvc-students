<?php

// define view
function view($view, $data = []) {
    extract($data);
    require_once APP_ROOT . "/views/{$view}.php";
}

// define redirect
function redirect($url) {
    if (!preg_match('/^(http:\/\/|https:\/\/)/', $url)) {
        $url = site_url($url);
    }
    header("Location: " . $url);
    exit();
}

// define site_url
function site_url($path = '') {
    // $base_url = 'http://localhost:8080/Internship/Practices/PHP/Demo/app';
    $base_url = 'http://127.0.0.1';
    return $base_url . $path;
}

// Define method
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_put_request() {
    return $_SERVER['REQUEST_METHOD'] === 'PUT';
}

function is_patch_request() {
    return $_SERVER['REQUEST_METHOD'] === 'PATCH';
}

function is_delete_request() {
    return $_SERVER['REQUEST_METHOD'] === 'DELETE';
}

//define role
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
