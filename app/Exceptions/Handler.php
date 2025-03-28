<?php

namespace App\Exceptions;

use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
        }

        if ($exception instanceof HttpException && $exception->getStatusCode() === 419) {
            return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
        }
    
        if ($exception instanceof FatalError && str_contains($exception->getMessage(), 'Maximum execution time')) {
            return redirect()->route('test-error');
        }

        if ($exception instanceof \Illuminate\Database\QueryException) {
            return response()->with(['error' => 'A database error occurred.'], 500);
        }

        return parent::render($request, $exception);
    }
}
