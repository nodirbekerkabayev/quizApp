<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\QuizController;
use src\Router;

Router::post('/api/register', [UserController::class , 'store']);
Router::post('/api/login', [UserController::class , 'login']);


//quize
Router::post('/api/quizzes', [QuizController::class , 'store']);



Router::notFound();
