<?php

namespace Core;

use Core\Middlewares\Middlewares;

class Router
{
	protected array $routes = [];

	public function get(string $uri, string $controller): Router
	{
		return $this->add('GET', $uri, $controller);
	}

	public function post(string $uri, string $controller): Router
	{
		return $this->add('POST', $uri, $controller);
	}

	public function delete(string $uri, string $controller): Router
	{
		return $this->add('DELETE', $uri, $controller);
	}

	public function patch(string $uri, string $controller): Router
	{
		return $this->add('PATCH', $uri, $controller);
	}

	public function put(string $uri, string $controller): Router
	{
		return $this->add('PUT', $uri, $controller);
	}

	public function add(string $method, string $uri, string $controller): Router
	{
		$this->routes[] = compact('method', 'uri', 'controller');
		return $this;
	}

	public function only(string $key): Router
	{
		$this->routes[array_key_last($this->routes)]['middleware'] = $key;
		return $this;
	}

	public function route(string $uri, string $method): void
	{
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				Middlewares::resolve($route['middleware']);

				require base_path('Http/Controllers/' . $route['controller']);
				return;
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
