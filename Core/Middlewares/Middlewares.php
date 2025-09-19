<?php

namespace Core\Middlewares;

use Exception;

class Middlewares
{
	const MAP = [
		'guest' => Guest::class,
		'auth' => Auth::class,
	];

	public static function resolve(null|string $key): void
	{
		if (!$key)
			return;

		$middleware = static::MAP[$key] ?? false;
		if (!$middleware) {
			throw new Exception('Middleware not found');
		}
		new $middleware()->handle();
	}
}
