<?php

function routeToController(string $uri, array $routes): void
{
	if (array_key_exists($uri, $routes)) {
		require base_path($routes[$uri]);
	} else {
		abort();
	}
}

$uri = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'])['path'] : '/';
$routes = require base_path('routes.php');

routeToController($uri, $routes);
