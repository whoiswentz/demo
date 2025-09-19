<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Http\Forms\NoteForm;

$db = App::resolve(Database::class);

$form = NoteForm::validate([
	'body' => $_POST['body'],
]);

$user = new Authenticator()->user();
if (!$user) {
	$form->error('body', 'Unauthorized');
	$form->throw();
}

$db->query('insert notes (body, user_id) values (:body, :user_id)', [
	'body' => $form->attributes['body'],
	'user_id' => $user['id'],
]);

redirect('/notes');
