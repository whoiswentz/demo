<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
	protected array $errors = [];

	public function validate(string $email, string $password): bool
	{
		if (!Validator::email($email)) {
			$this->error('email', 'Please provide a valid email address');
		}

		if (!Validator::string($password, 7, 255)) {
			$this->error('password', 'Please provide a password of at least 7 characters');
		}

		return empty($this->errors);
	}

	public function error(string $field, string $message): void
	{
		$this->errors[$field] = $message;
	}

	public function errors(): array
	{
		return $this->errors;
	}
}
