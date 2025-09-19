<?php

namespace Http\Forms;

use Core\Exceptions\ValidationException;

class Form
{
	protected array $errors = [];

	public function __construct(
		public array $attributes,
	) {}

	public static function validate(array $attributes): static
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
