<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * A list of inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = ['password', 'password_confirmation'];

    /**
     * Report or log an exception.
     *
     * @param  Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Throwable  $exception
     * @return Response
     */
    public function render($request, Throwable $exception)
    {
        // Custom 404 Page
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
}
