<?php

namespace Src\middlewares;

class AuthMiddleware implements Middleware
{
    public function handle():void {
        \Src\Auth::check();
    }
}