<?php

//use App\Router;
//use controllers\UserController;

//Router::get('/', [UserController::class, 'index']);

use App\Models\User;

$user = new User();

var_dump(
    $user->create('dilshodbekerolov','erolov1231567891115@gmail.com','1234')

);