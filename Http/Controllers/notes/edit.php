<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
	'user_id' => 1,
	'id' => $_GET['id'],
])->fetchOrFail();

authorize($note['user_id'] === 1);

view('notes/edit', [
	'heading' => 'Edit Note',
	'errors' => [],
	'note' => $note,
]);
