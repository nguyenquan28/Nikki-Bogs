<?php

// Check value $_GET
$get_controller = empty($_GET['c']) ? 'post' : $_GET['c'];
$get_action = empty($_GET['a']) ? 'getAll' : $_GET['a'];
$controller = $get_controller . "Controller";
$path_controller = '../../Controller/' . $controller . '.php';

// Check file exist
if (!file_exists($path_controller)) {
    die('File not found');
}
require_once $path_controller;
// Check class
if (!class_exists($controller)) {
    die('Class not exits');
}

$controller0home = new $controller;
// Check function
if (!method_exists($controller0home, $get_action)) {
    die('Function not found');
}

// Call function
$controller0home->{$get_action}();