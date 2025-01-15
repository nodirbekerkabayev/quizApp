<?php

namespace App\Http\Controllers\API;

use JetBrains\PhpStorm\NoReturn;
use Src\Auth;


class QuizController
{
    #[NoReturn] public function store(): void
    {
        apiResponse(['message' => 'quiz successfully created'], 201);
    }
}