<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        /* Sentri */
        // if (app()->bound('sentry') && $this->shouldReport($exception))
        // {
        //     app('sentry')->captureException($exception);
        // }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return redirect()->route('home');
        }
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                $lang = \App\Language::where('id', 1)->first();
                config(['app.lang' => $lang]);
                \App::setLocale($lang->slug);
                // return response()->view('errors.' . '404', ['errors' => null], 404);
                return redirect()->route('notFound');
            }
        }
        return parent::render($request, $exception);
    }
}
