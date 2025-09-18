<?php

namespace Http\Forms;

use Core\Exceptions\ValidationException;
use Core\Validator;

class LoginForm
{
	protected array $errors = [];

	public function __construct(
		public array $attributes,
	) {
		if (!Validator::email($this->attributes['email'])) {
			$this->error('email', 'Please provide a valid email address');
		}

		if (!Validator::string($this->attributes['password'], 7, 255)) {
			$this->error('password', 'Please provide a password of at least 7 characters');
		}
	}

	public static function validate(array $attributes): LoginForm
	{
		$instance = new static($attributes);
		return $instance->failed() ? $instance->throw() : $instance;
	}

	public function failed(): bool
	{
		return count($this->errors) > 0;
	}

	public function throw(): static
	{
		ValidationException::throw($this->errors(), $this->attributes);
		return $this;
	}

	public function error(string $field, string $message): static
	{
		$this->errors[$field] = $message;
		return $this;
	}

	public function errors(): array
	{
		return $this->errors;
	}
}
