<?php

use Core\Response;

function isUrl(string $url): bool
{
	return isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === $url;
}

function authorize(bool $condition, Response $status = Response::FORBIDDEN): void
{
	if (!$condition) {
		abort($status);
	}
}

function abort(Response $code = Response::NOT_FOUND): void
{
	$value = $code->value;

	http_response_code($value);
	require base_path("views/{$value}.view.php");
	die();
}

function base_path(string $path): string
{
	return BASE_PATH . $path;
}

function view(string $path, array $attributes = []): void
{
	extract($attributes);
	require base_path("views/{$path}.view.php");
}

function dd(mixed $value): void
{
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
	die();
}

function login(array $user): void
{
	$_SESSION['user'] = [
		'email' => $user['email'],
		'id' => $user['id'],
	];
	session_regenerate_id(true);
}

function logout(): void
{
	unset($_SESSION['user']);
	session_destroy();
	$params = session_get_cookie_params();
	setcookie(
		'PHPSESSID',
		'',
		time() - 3600,
		$params['path'],
		$params['domain'],
		$params['secure'],
		$params['httponly'],
	);
}
