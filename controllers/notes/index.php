<?php

use Core\Database;

require_once base_path('core/function.php');

$username = 'demo_user';
$password = 'demo_password';
$config = require base_path('config.php');

$db = new Database($config['database'], $username, $password);

$notes = $db->query('select * from notes')->fetchAll();

view('notes/index', [
	'heading' => 'My Notes',
	'notes' => $notes,
]);
