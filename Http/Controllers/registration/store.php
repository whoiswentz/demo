<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password'],
];

$form = LoginForm::validate($attributes);

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
	'email' => $email,
])->fetch();
if ($user) {
	$form->error('email', 'Email already exists');
	$form->throw();
}

$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
	'email' => $email,
	'password' => password_hash($password, PASSWORD_BCRYPT),
]);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
	'email' => $email,
])->fetch();

Session::flash('flash', 'Your account has been created');
$authenticator = new Authenticator();
$signedIn = $authenticator->attempt($form->attributes['email'], $form->attributes['password']);
if (!$signedIn) {
	$form->error('email', 'The provided credentials are incorrect')->throw();
}

redirect('/');
