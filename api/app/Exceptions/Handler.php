<?php

namespace App\Exceptions;

use ErrorException;
use Exception;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use PDOException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // erro 500 para ErrorException
        if ($exception instanceof ErrorException) {
            return response()->json([
                'error' => 'Erro interno do servidor'
            ], 500);
        }

        // erro 500 para PDOException
        if ($exception instanceof PDOException) {
            return response()->json([
                'error' => 'Erro interno do servidor'
            ], 500);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Recurso não encontrado'
            ], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => 'Método não permitido'
            ], 405);
        }

        return parent::render($request, $exception);
    }
}
