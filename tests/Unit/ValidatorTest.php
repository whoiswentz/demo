<?php

use Core\Validator;

test('Validator', function () {
	expect(Validator::string('Hello'))->toBeTrue();
	expect(Validator::string('Hello', 1, 10))->toBeTrue();
	expect(Validator::email('test@test.com'))->toBeString();
	expect(Validator::string('Hello', 1, 10))->toBeTrue();
	expect(Validator::string(''))->toBeFalse();
});
