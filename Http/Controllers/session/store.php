<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if ($form->validate($email, $password)) {
	$authenticator = new Authenticator();
	if ($authenticator->attempt($email, $password)) {
		redirect('/');
	}
	$form->error('email', 'The provided credentials are incorrect');
	$form->error('password', 'The provided credentials are incorrect');
}

Session::flash('errors', $form->errors());

return redirect('/login');
