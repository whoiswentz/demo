<?php

namespace Core;

class Router
{
	protected array $routes = [];

	public function get(string $uri, string $controller): void
	{
		$this->add('GET', $uri, $controller);
	}

	public function post(string $uri, string $controller): void
	{
		$this->add('POST', $uri, $controller);
	}

	public function delete(string $uri, string $controller): void
	{
		$this->add('DELETE', $uri, $controller);
	}

	public function patch(string $uri, string $controller): void
	{
		$this->add('PATCH', $uri, $controller);
	}

	public function put(string $uri, string $controller): void
	{
		$this->add('PUT', $uri, $controller);
	}

	public function add(string $method, string $uri, string $controller): void
	{
		$this->routes[] = compact('method', 'uri', 'controller');
	}

	public function route(string $uri, string $method): void
	{
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				require base_path($route['controller']);
			}
		}

		$this->abort();
	}

	private function abort(Response $code = Response::NOT_FOUND): void
	{
		$value = $code->value;
		http_response_code($value);
		require base_path("views/{$value}.view.php");
		die();
	}
}
