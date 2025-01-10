<?php

namespace App\Http\Controllers\API;

use Src\Auth;


class QuizController
{
    public function store()
    {
        if (Auth::check()) {
            $headers = getallheaders();
            $token = $headers['Authorization'];
            $token = str_replace('Bearer ', '', $token);
            apiResponse([
                'message' => 'User not logged in successfully',

            ],201);
        }
    }
}