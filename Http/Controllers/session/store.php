<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password'],
];

$form = LoginForm::validate($attributes);

$authenticator = new Authenticator();
$signedIn = $authenticator->attempt($form->attributes['email'], $form->attributes['password']);
if (!$signedIn) {
	$form->error('email', 'The provided credentials are incorrect')->throw();
}

redirect('/');
