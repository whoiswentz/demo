<?php

use Core\Exceptions\ValidationException;
use Core\Router;
use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'Core/function.php';

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
