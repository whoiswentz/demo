<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
	'user_id' => 1,
	'id' => $_POST['id'],
])->fetchOrFail();

authorize($note['user_id'] === 1);

$errors = [];
if (!Validator::string($_POST['body'], 1, 1000)) {
	$errors['body'] = 'A body of no more than 1000 characters is required';
}

if (!empty($errors)) {
	return view('notes/edit', [
		'heading' => 'Edit Note',
		'note' => $note,
		'errors' => $errors,
	]);
}

$db->query('update notes set body = :body where id = :id', [
	'body' => $_POST['body'],
	'id' => $_POST['id'],
]);

redirect('/notes');
