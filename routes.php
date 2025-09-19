<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
$router->delete('/notes', 'notes/destroy.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');

$router->get('/notes/edit', 'notes/edit.php')->only('auth');
$router->patch('/notes', 'notes/update.php')->only('auth');

$router->get('/registration', 'registration/create.php')->only('guest');
$router->post('/registration', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');