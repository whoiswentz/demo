<?php

require_once 'function.php';

$heading = 'Notes';

$username = "demo_user";
$password = "demo_password";
$config = require 'config.php';

$db = new Database($config['database'], $username, $password);

$note = $db
    ->query("select * from notes where id = :id and user_id = :user_id", [
        'user_id' => 1,
        'id' => $_GET['id']
    ])
    ->fetchOrFail();
    
authorize($note['user_id'] === 1);

include 'views/notes/show.view.php';