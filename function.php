<?php

function isUrl(string $url): bool {
    return isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === $url;
}