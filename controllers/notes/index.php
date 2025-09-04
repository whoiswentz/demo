<?php

require_once 'function.php';

$heading = 'My Notes';

$username = "demo_user";
$password = "demo_password";
$config = require 'config.php';

$db = new Database($config['database'], $username, $password);

$notes = $db
    ->query("select * from notes")
    ->fetchAll();

include 'views/notes.view.php';