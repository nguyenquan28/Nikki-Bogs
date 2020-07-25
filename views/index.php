<?php

// define('SYSTEM_PATH', __DIR__);

// Check value $_GET
$get_controller = empty($_GET['c']) ? 'home' : $_GET['c'];
$get_action = empty($_GET['a']) ? '' : $_GET['a'];
$controller = $get_controller . "Controller";
$path_controller = '../controller/' . $controller . '.php';

// Check file exist
if (!file_exists($path_controller)) {
    die('File not found');
}
require_once $path_controller;
// Check class
if (!class_exists($controller)) {
    die('Class not exits');
}

$controllerhome = new $controller;
// Check function
if (!method_exists($controllerhome, $get_action)) {
    die('Function not found');
}

// Call function
$controllerhome->{$get_action}();
