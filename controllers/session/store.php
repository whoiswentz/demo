<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
	$errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
	$errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
	return view('session/create', [
		'errors' => $errors,
	]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();
if ($user && password_verify($password, $user['password'])) {
	login($user);
	header('Location: /');
	exit();
}

$errors['email'] = 'The provided credentials are incorrect';
$errors['password'] = 'The provided credentials are incorrect';
return view('session/create', ['errors' => $errors]);
