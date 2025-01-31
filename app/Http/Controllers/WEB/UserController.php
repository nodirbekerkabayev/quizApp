<?php

namespace App\Http\Controllers\WEB;

use JetBrains\PhpStorm\NoReturn;

class UserController
{
    #[NoReturn] public function home(): void
    {
        view('dashboard/home');
    }
    #[NoReturn] public function quizzes(): void
    {
        view('dashboard/quizzes');
    }
    #[NoReturn] public function create_quiz(): void
    {
        view('dashboard/create-quiz');
    }
    #[NoReturn] public function statistics(): void
    {
        view('dashboard/statistics');
    }
    #[NoReturn] public function takeQuiz(): void
    {
        view('quiz/takeQuiz');
    }

    #[NoReturn] public function update(int $id): void
    {
        view('dashboard/update-quiz', [
            'id' => $id
        ]);
    }
}