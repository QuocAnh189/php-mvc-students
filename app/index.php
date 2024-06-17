<?php

define('APP_ROOT', __DIR__);

require_once APP_ROOT . '/../vendor/autoload.php';
require_once APP_ROOT . '/helpers/helpers.php'; 

// Load configuration
$configPath = APP_ROOT . '/config/database.php';
if (!file_exists($configPath)) {
    die("Config file not found: " . $configPath);
}

// Load configuration
$config = require $configPath;

// Initialize Medoo
$database = new Medoo\Medoo($config);

// Get the requested URL using REQUEST_URI
$requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

// Remove the query string from REQUEST_URI
$requestUri = explode('?', $requestUri)[0];

// Remove the base path (if any)
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

// Remove leading and trailing slashes for consistency
$requestUri = trim($requestUri, '/');

// Default routing: if no URL is provided, use HomeController and index action
if ($requestUri === '') {
    $controllerName = 'Auth';
    $actionName = 'signin';
} else {
    // Process the URL into controller, action, and parameters
    $urlParts = explode('/', $requestUri);
    
    $controllerName = ucfirst($urlParts[0]);
    $actionName = isset($urlParts[1]) ? $urlParts[1] : 'index';
    $parameter = isset($urlParts[2]) ? $urlParts[2] : null;

    // If the controller name contains '.', consider it invalid
    if (strpos($controllerName, '.') !== false) {
        $controllerName = 'Error'; // or whatever your error controller is called
        $actionName = 'index'; // or whatever your error action is called
    }
}

$controllerPath = APP_ROOT . '/controllers/' . $controllerName . 'Controller.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = $controllerName . 'Controller';
    $controller = new $controllerClass($database);

    if (method_exists($controller, $actionName)) {
        if (isset($parameter)) {
            $controller->{$actionName}($parameter);
        } else {
            $controller->{$actionName}();
        }
    } else {
        echo "Action not found.";
    }
} else {
    echo "Controller not found.";
}