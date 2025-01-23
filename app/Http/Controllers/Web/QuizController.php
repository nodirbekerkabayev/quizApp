<?php

namespace App\Http\Controllers\Web;

use App\Models\Quiz;
use JetBrains\PhpStorm\NoReturn;

class QuizController
{
    #[NoReturn] public function takeQuiz(string $uniqueValue): void
    {
        view('quiz/takeQuiz', ['uniqueValue' => $uniqueValue]);
    }
}