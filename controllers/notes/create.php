<?php

require 'Validator.php';

$heading = "Create Note";

$username = "demo_user";
$password = "demo_password";
$config = require 'config.php';

$db = new Database($config['database'], $username, $password);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1000 characters is required';
    }

    if (empty($errors)) {
        $db->query("insert notes (body, user_id) values (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

include "views/notes/create.view.php";