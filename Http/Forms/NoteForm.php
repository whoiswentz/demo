<?php

namespace Http\Forms;

use Core\Validator;

class NoteForm extends Form
{
	public function __construct(array $attributes)
	{
		parent::__construct($attributes);

		if (!Validator::string($this->attributes['body'], 1, 1000)) {
			$this->error('body', 'A body of no more than 1000 characters is required');
		}
	}
}
