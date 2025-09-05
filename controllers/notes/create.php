<?php

$heading = "Create Note";

$username = "demo_user";
$password = "demo_password";
$config = require 'config.php';

$db = new Database($config['database'], $username, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("insert notes (body, user_id) values (:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1,
    ]);
}

include "views/note-create.view.php";