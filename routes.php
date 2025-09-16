<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->delete('/notes', 'controllers/notes/destroy.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->patch('/notes', 'controllers/notes/update.php');

$router->get('/registration', 'controllers/registration/create.php')->only('guest');
$router->post('/registration', 'controllers/registration/store.php');