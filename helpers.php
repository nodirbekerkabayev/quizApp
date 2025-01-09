<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use JetBrains\PhpStorm\NoReturn;
function view(string $page, array $data = []): void
{
    extract($data);
    require 'resources/views/' . $page . '.php';
}
function redirect(string $url){
    header("Location: $url");
    exit;
}
function dumpDie($value)
{
    var_dump($value);
    exit();
}
#[NoReturn] function apiResponse($data, $status = 200): void
{
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}