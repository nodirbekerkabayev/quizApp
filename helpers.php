<?php

use JetBrains\PhpStorm\NoReturn;
function view(string $page, array $data = []): void
{
    extract($data);
    require 'views/' . $page . '.php';
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
#[NoReturn] function apiResponse($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}