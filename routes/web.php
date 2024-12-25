<?php

//use App\Router;
//use controllers\UserController;

//Router::get('/', [UserController::class, 'index']);

use App\Models\User;

$user = new User();

dd(
    $user->create('dilshodbek erolov','erolov12315678@gmail.com','1234')

);