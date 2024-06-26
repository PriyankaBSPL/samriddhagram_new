<?php

use App\Http\Middleware\AuthGuest;
use App\Http\Middleware\AdminRedirect;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

        $middleware->alias([
            'AdminAuthenticate' => AdminAuthenticate::class,
            'AuthGuest' => AuthGuest::class,
        ]);

        // $middleware->redirectTo(
        //     guests: 'login',
        //     users: 'dashboard',
        // );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
