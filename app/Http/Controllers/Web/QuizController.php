<?php

namespace App\Http\Controllers\Web;

use App\Models\Quiz;
use JetBrains\PhpStorm\NoReturn;

class QuizController
{
    #[NoReturn] public function takeQuiz(string $uniqueValue): void
    {
        $quiz = (new Quiz())->findByUniqueValue($uniqueValue);
        if (!$quiz) {
            view('errors/404');
        }
        view('quiz/takeQuiz');
    }

}