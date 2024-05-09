<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

        // $middleware->alias(
        //     guests: '/admin/login',
        //     users: '/admin/dashboard',

        // );

        // $middleware->redirectTo(
        //     guests: '/admin/login',
        //     users: '/admin/dashboard',

        // );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
