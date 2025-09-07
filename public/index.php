<?php


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
    require base_path("core/{$class}.php");
});

require base_path('core/router.php');