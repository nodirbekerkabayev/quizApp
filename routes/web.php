<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\QuizController;
use App\Http\Controllers\Web\UserController;
use src\Router;

Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);
Router::get('/dashboard', [UserController::class, 'home']);
Router::get('/dashboard/quizzes', [UserController::class, 'quizzes']);
Router::get('/dashboard/create-quiz', [UserController::class, 'create_quiz']);
Router::get('/dashboard/statistics', [UserController::class, 'statistics']);
Router::get('/take-quiz/{id}', [QuizController::class, 'takeQuiz']);
Router::get('/dashboard/quizzes/{id}/update', [UserController::class, 'update']);

Router::notFound();