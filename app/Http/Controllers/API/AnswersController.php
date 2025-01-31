<?php

namespace App\Http\Controllers\API;

use App\Models\Answer;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;

class AnswersController
{
    use Validator;
    #[NoReturn] public function store(): void
    {
        $answerItems = $this->validate([
            'result_id' => 'required|array',
            'option_id' => 'required|array',

        ]);
        $answer = new Answer();
        $answerData = $answer->create(
            $answerItems['result_id'],
            $answerItems['option_id'],
        );
        apiResponse([
            'message' => "Answer created successfully",
            'answer' => $answerData,
        ]);
    }
}