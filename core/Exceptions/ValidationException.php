<?php

namespace Core\Exceptions;

use Exception;

class ValidationException extends Exception
{
	protected array $errors = [];
	protected array $attributes = [];

	public static function throw(array $errors, array $attributes)
	{
		$instance = new static();
		$instance->errors = $errors;
		$instance->attributes = $attributes;
		throw $instance;
	}

	public function errors(): array
	{
		return $this->errors;
	}

	public function attributes(): array
	{
		return $this->attributes;
	}
}
