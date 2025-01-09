<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Web\HomeController;
use src\Router;


Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);