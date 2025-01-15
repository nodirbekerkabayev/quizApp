<?php

use JetBrains\PhpStorm\NoReturn;
function view(string $page, array $data = []): void
{
    extract($data);
    require 'resources/views/' . $page . '.php';
}
function components(string $page, array $data = []): void
{
    extract($data);
    require 'resources/views/components/' . $page . '.php';
}
#[NoReturn] function apiResponse($data, $status = 200): void
{
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}