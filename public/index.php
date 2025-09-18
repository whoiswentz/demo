<?php

use Core\Exceptions\ValidationException;
use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
	$file = str_replace('\\', '/', $class);
	$file = str_replace('Core/', 'core/', $file);
	require base_path("{$file}.php");
});

Session::start();

require BASE_PATH . 'bootstrap.php';

$router = new Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
	$router->route($uri, $method);
} catch (ValidationException $exception) {
	Session::flash('errors', $exception->errors());
	Session::flash('old', $exception->attributes());
	return redirect($router->previousUrl());
}

Session::unflash();
