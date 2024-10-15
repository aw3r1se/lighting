<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {})
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('backup:run')
            ->daily()
            ->at('3:00');

        $schedule->command('backup:clean')
            ->daily()
            ->at('4:00');

        $schedule->command('activitylog:clean --days=7')
            ->daily()
            ->at('5:00');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response) {
            $msg = match ($response->status()) {
                ResponseAlias::HTTP_NOT_FOUND => 'Not found',
                default => null,
            };

            $response->setContent([
                'message' => $msg,
            ]);

            return $response;
        });
    })->create();
