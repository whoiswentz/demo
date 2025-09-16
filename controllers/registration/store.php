<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
	$errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
	$errors['password'] = 'Please provide a password of at least 7 characters';
}

if (count($errors)) {
	view('registration/create', [
		'errors' => $errors,
	]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
	'email' => $email,
])->fetch();
if ($user) {
	$errors['email'] = 'Email already exists';
	header('Location: /');
	exit();
} else {
	$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT),
	]);

	// Fetch the newly created user for login
	$user = $db->query('SELECT * FROM users WHERE email = :email', [
		'email' => $email,
	])->fetch();

	$_SESSION['flash'] = 'Your account has been created';
	login($user);

	header('Location: /');
	exit();
}
