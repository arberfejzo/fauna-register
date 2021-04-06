<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/views/login.php';
        break;
    case '':
        require __DIR__ . '/views/login.php';
        break;
    case '/login':
        require __DIR__ . '/views/login.php';
        break;
    case '/list':
        require __DIR__ . '/views/list.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
