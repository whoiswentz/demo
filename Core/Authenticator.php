<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{
	public function attempt(string $email, string $password): bool
	{
		$db = App::resolve(Database::class);
		$user = $db->query('SELECT * FROM users WHERE email = :email', [
			'email' => $email,
		])->fetch();

		if ($user && password_verify($password, $user['password'])) {
			$this->login($user);
			return true;
		}

		return false;
	}

	public function login(array $user): void
	{
		$_SESSION['user'] = [
			'email' => $user['email'],
			'id' => $user['id'],
		];
		session_regenerate_id(true);
	}

	public function logout(): void
	{
		Session::destroy();
	}

	public function user(): array|false
	{
		return Session::get('user', false);
	}
}
