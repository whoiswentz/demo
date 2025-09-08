<?php


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $file = str_replace('\\', '/', $class);
    $file = str_replace('Core/', 'core/', $file);
    require base_path("{$file}.php");
});

require base_path('core/router.php');