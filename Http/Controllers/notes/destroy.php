<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
	'user_id' => 1,
	'id' => $_POST['id'],
])->fetchOrFail();

authorize($note['user_id'] === 1);

$db->query('delete from notes where id = :id', [
	'id' => $_POST['id'],
]);

redirect('/notes');
