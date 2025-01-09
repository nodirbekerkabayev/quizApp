<?php

namespace App\Http\Controllers\Web;

class HomeController
{
    public function home(){
         view('home');
    }
    public function about(){
        view('about');
    }
    public function contact(){
        view('contact');
    }
    public function login(){
        view('login');
    }
    public function register(){
        view('register');
    }

}