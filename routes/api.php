<?php

use Source\Router;
use App\Controllers\API\UserController;

Router::post('/api/users', [UserController::class , 'store']);
Router::get('/api/users/{id}', [UserController::class , 'show']);
Router::delete('/api/users/{id}', [UserController::class , 'destroy']);
Router::put('/api/users/{id}', [UserController::class , 'update']);
