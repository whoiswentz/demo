<?php

namespace Core\Middlewares;

class Guest implements Middleware
{
	public function handle(): void
	{
		if ($_SESSION['user'] ?? false) {
			header('Location: /');
			exit();
		}
	}
}
