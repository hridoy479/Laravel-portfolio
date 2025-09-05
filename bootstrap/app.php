<?php
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminOnly;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware): void {
        // Register named middleware
        $middleware->alias([
            'admin'=>AdminOnly::class,
        ]);
    })
    ->withExceptions(function ($exceptions): void {
        //
    })
    ->create();

    