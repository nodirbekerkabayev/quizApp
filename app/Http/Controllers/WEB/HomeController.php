<?php

namespace App\Http\Controllers\WEB;
use JetBrains\PhpStorm\NoReturn;

class HomeController
{
    #[NoReturn] public function home(): void{ view('home');}
    #[NoReturn] public function about(): void{ view('about');}
    #[NoReturn] public function login(): void{ view('auth/login');}
    #[NoReturn] public function register(): void{ view('auth/register');}
}
