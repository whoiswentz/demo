<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$username = 'demo_user';
$password = 'demo_password';
$container->bind(Database::class, function () use ($username, $password) {
    $config = require base_path('config.php');
    return new Database($config['database'], $username, $password);
});

App::setContainer($container);