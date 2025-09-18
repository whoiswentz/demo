<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes')->fetchAll();

view('notes/index', [
	'heading' => 'My Notes',
	'notes' => $notes,
]);
