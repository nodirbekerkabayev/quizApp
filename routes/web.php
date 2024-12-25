<?php

//use App\Router;
//use controllers\UserController;

//Router::get('/', [UserController::class, 'index']);

use App\Models\User;

$user = new User();

dd($user->create('ali', 'ali@gmail.com', '123456789'));