<?php 

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'];

$endpoint = str_replace('/teste/index.php/', '', $uri);
$endpoint = substr($endpoint, 0, strrpos($endpoint, '/'));

switch ($endpoint) {
    case 'user':
        require __DIR__ . '/api/user/index.php';
        break;
    case 'module':
        require __DIR__ . '/api/module/index.php';
        break;
    default:
        # code...
        break;
}