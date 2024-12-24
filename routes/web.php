<?php

use App\Router;
use controllers\UserController;

Router::get('/', [UserController::class, 'index']);