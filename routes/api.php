<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\QuizController;
use Source\Router;

Router::post('/api/users', [UserController::class , 'store']);
Router::get('/api/users/{id}', [UserController::class , 'show']);
Router::delete('/api/users/{id}', [UserController::class , 'destroy']);
Router::put('/api/users/{id}', [UserController::class , 'update']);
