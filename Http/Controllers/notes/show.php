<?php

use Core\App;
use Core\Authenticator;
use Core\Database;

$db = App::resolve(Database::class);

$user = new Authenticator()->user();
if (!$user) {
	$form->error('body', 'Unauthorized');
	$form->throw();
}

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
	'user_id' => $user['id'],
	'id' => $_GET['id'],
])->fetchOrFail();

view('notes/show', [
	'heading' => 'Notes',
	'note' => $note,
]);
