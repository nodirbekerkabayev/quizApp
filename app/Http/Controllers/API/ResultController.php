<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;
use Src\Auth;

class ResultController
{
    use Validator;
    #[NoReturn] public function store(): void
    {
        $resultItems = $this->validate([
            'quiz_id' => 'required',
        ]);
        $quiz= (new Quiz())->find($resultItems['quiz_id']);
        if ($quiz) {
            $result = new Result();
            $result->create(
                Auth::user()->id,
                $quiz->id,
                $quiz->time_limit
            );
            apiResponse([
                'message' => 'Result created successfully.',
            ]);
        }
        apiResponse([
            'errors' => [
                'message' => 'Quiz not found'
                ]
            ], 400);
    }

}