<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
	public function __construct(array $attributes)
	{
		parent::__construct($attributes);

		if (!Validator::email($this->attributes['email'])) {
			$this->error('email', 'Please provide a valid email address');
		}

		if (!Validator::string($this->attributes['password'], 7, 255)) {
			$this->error('password', 'Please provide a password of at least 7 characters');
		}
	}
}
