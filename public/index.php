<?php

use Core\Router;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
	$file = str_replace('\\', '/', $class);
	$file = str_replace('Core/', 'core/', $file);
	require base_path("{$file}.php");
});

require BASE_PATH . 'bootstrap.php';

$router = new Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
