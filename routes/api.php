<?php

use App\Http\Controllers\API\UserController;
use src\Router;

Router::get('/api/users/{id}',[UserController::class,'show'],'auth:api');

Router::post('/api/register', [UserController::class , 'store']);
Router::post('/api/login', [UserController::class , 'login']);
Router::notFound();