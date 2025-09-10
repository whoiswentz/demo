<?php

use Core\Database;

require_once base_path('core/function.php');

$username = 'demo_user';
$password = 'demo_password';
$config = require base_path('config.php');

$db = new Database($config['database'], $username, $password);

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
	'user_id' => 1,
	'id' => $_POST['id'],
])->fetchOrFail();

authorize($note['user_id'] === 1);

$db->query('delete from notes where id = :id', [
	'id' => $_POST['id'],
]);

header('location: /notes');
exit();
