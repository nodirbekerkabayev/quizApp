<?php

namespace App\Http\Controllers\API;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;
use Src\Auth;


class QuizController
{
    use Validator;

    #[NoReturn] public function index(): void
    {
        $userId = Auth::user()->id;
        $quiz = new Quiz();
        $quizzes = $quiz->getByUserId($userId);
        apiResponse(['quizzes' => $quizzes]);
    }

    #[NoReturn] public function show(int $quizId): void
    {
        $quiz = (new Quiz())->find($quizId);
        $questions = (new Question())->getWithOptions($quizId);
        $quiz->questions = $questions;
        apiResponse($quiz);
    }
    #[NoReturn] public function store(): void
    {
        $quizItems = $this->validate([
           'title' => 'string',
            'description' => 'string',
            'timeLimit' => 'integer',
            'questions' => 'array',
        ]);

        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

        $quiz_id = $quiz->create(
            Auth::user()->id,
            $quizItems['title'],
            $quizItems['description'],
            $quizItems['timeLimit'],
        );
        $questions = $quizItems['questions'];

        foreach ($questions as $questionItem) {
            $question_id = $question->create($quiz_id, $questionItem['quiz']);
            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
        apiResponse(['message' => 'quiz successfully created'], 201);
    }

    #[NoReturn] public function update($quizId): void
    {
        $quizItems = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'timeLimit' => 'required',
        ]);

        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

        $quiz->update(
            $quizId,
            $quizItems['title'],
            $quizItems['description'],
            $quizItems['timeLimit'],
        );

        $question->deleteByQuizId($quizId);

        $questions = $quizItems['questions'];

        foreach ($questions as $questionItem) {
            $question_id = $question->create($quizId, $questionItem['quiz']);
            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
        apiResponse(['message' => 'quiz successfully updated'], 201);
    }
    #[NoReturn] public function destroy(int $quizId): void
    {
        $quiz = new Quiz();
        $quiz->delete($quizId);
        apiResponse(['message' => 'quiz successfully deleted']);
    }
}