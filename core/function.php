<?php

use Core\Response;

function isUrl(string $url): bool {
    return isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === $url;
}

function authorize(
    bool $condition, 
    Response $status = Response::FORBIDDEN
): void {
    if (!$condition) {
        abort($status);
    }
}

function abort(Response $code = Response::NOT_FOUND): void {
    $value = $code->value;
    
    http_response_code($value);
    require base_path("views/{$value}.view.php");
    die();
}

function base_path(string $path): string {
    return BASE_PATH . $path;
}

function view(string $path, array $attributes = []): void {
    extract($attributes);
    require base_path("views/{$path}.view.php");
}