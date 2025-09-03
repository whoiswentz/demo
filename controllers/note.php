<?php

require_once 'function.php';

$heading = 'Notes';

$username = "demo_user";
$password = "demo_password";
$config = require('config.php');

$db = new Database($config['database'], $username, $password);

$note = $db
    ->query("select * from notes where id = :id", ['id' => $_GET['id']])
    ->fetch();

include 'views/note.view.php';