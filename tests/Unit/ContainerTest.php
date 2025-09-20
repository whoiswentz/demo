<?php

use Core\Container;

test('Container', function () {
	$container = new Container();
	$container->bind('foo', function () {
		return 'bar';
	});
	expect($container->resolve('foo'))->toBe('bar');
});
