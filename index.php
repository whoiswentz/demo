<?php

require_once 'function.php';
require_once 'router.php';
require_once 'Database.php';

$username = "demo_user";
$password = "demo_password";
$config = require('config.php');

$db = new Database($config['database'], $username, $password);

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
foreach ($posts as $post) {
    echo $post['title'] . "<br>";
}
