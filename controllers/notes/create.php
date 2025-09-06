<?php

$heading = "Create Note";

$username = "demo_user";
$password = "demo_password";
$config = require 'config.php';

$db = new Database($config['database'], $username, $password);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'Body cannot be longer than 1000 characters';
    }

    if (empty($errors)) {
        $db->query("insert notes (body, user_id) values (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

include "views/note-create.view.php";