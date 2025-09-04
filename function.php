<?php

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
    require "views/{$value}.view.php";
    die();
}