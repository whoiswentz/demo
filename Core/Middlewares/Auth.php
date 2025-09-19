<?php

namespace Core\Middlewares;

class Auth implements Middleware
{
	public function handle(): void
	{
		if (!$_SESSION['user'] ?? false) {
			redirect('/');
		}
	}
}
