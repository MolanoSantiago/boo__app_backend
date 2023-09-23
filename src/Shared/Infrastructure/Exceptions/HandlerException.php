<?php

namespace Hex\Shared\Infrastructure\Exceptions;

use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Shared\Infrastructure\Logger\CustomLogger;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use TypeError;

class HandlerException extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(
            function (Throwable $e) {
                $logger = new CustomLogger();

                $contentType = request()->headers->get('Content-Type');

                return match (true) {
                    $contentType !== 'application/json' => response()->json([
                        'message' => 'Content-Type header is not application/json',
                        'status' => HttpCodes::HTTP_BAD_REQUEST,
                        'code' => null,
                        'errors' => true,
                    ], HttpCodes::HTTP_BAD_REQUEST),
                    $e instanceof CustomException => $this->handleCustomException($e, $logger),
                    $e instanceof NotFoundHttpException => $this->handleNotFoundHttpException($e, $logger),
                    $e instanceof AuthenticationException => $this->handleAuthenticationException(),
                    $e instanceof InvalidArgumentException => $this->handleInvalidArgumentException($e),
                    $e instanceof TypeError => $this->handleTypeError(),
                    $e instanceof QueryException => $this->handleQueryException($e, $logger),
                    $e instanceof ValidationException => $this->handleValidationException($e, $logger),
                    default => $this->handleDefaultException($e, $logger),
                };
            }
        );
    }

    private function handleCustomException(CustomException $e, CustomLogger $logger): JsonResponse
    {
        $logger->error($e->getMessage(), [
            'exception_class' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        return response()->json($e->toException(), $e->getCode());
    }

    private function handleNotFoundHttpException(NotFoundHttpException $e, CustomLogger $logger): JsonResponse
    {
        $logger->error($e->getMessage(), [
            'exception_class' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        return response()->json([
            'message' => 'Recurso no encontrado',
            'status' => HttpCodes::HTTP_NOT_FOUND,
            'errors' => true,
            'code' => null,
        ], HttpCodes::HTTP_NOT_FOUND);
    }

    private function handleAuthenticationException(): JsonResponse
    {
        return response()->json([
            'message' => 'Sin autentificar',
            'status' => HttpCodes::HTTP_UNAUTHORIZED,
            'code' => null,
            'errors' => true,
        ], HttpCodes::HTTP_UNAUTHORIZED);
    }

    private function handleInvalidArgumentException(InvalidArgumentException $e): JsonResponse
    {
        return response()->json([
            'message' => $e->getMessage(),
            'status' => HttpCodes::HTTP_UNPROCESSABLE_ENTITY,
            'code' => null,
            'errors' => true,
        ], HttpCodes::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function handleTypeError(): JsonResponse
    {
        return response()->json([
            'message' => 'El tipo de dato no es el correcto.',
            'status' => HttpCodes::HTTP_UNPROCESSABLE_ENTITY,
            'code' => null,
            'errors' => true,
        ], HttpCodes::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function handleQueryException(QueryException $e, CustomLogger $logger): JsonResponse
    {
        $logger->error($e->getMessage(), [
            'exception_class' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        return response()->json([
            'message' => 'Error interno del servidor',
            'status' => HttpCodes::HTTP_INTERNAL_SERVER_ERROR,
            'code' => null,
            'errors' => true,
        ], HttpCodes::HTTP_INTERNAL_SERVER_ERROR);
    }

    private function handleValidationException(ValidationException $e, CustomLogger $logger): JsonResponse
    {
        $logger->error($e->getMessage(), [
            'exception_class' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        $validationErrors = $e->errors();

        return response()->json([
            'message' => $e->getMessage(),
            'status' => HttpCodes::HTTP_UNPROCESSABLE_ENTITY,
            'code' => null,
            'errors' => count($validationErrors) > 1 ? $validationErrors : true,
        ], HttpCodes::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function handleDefaultException(Throwable $e, CustomLogger $logger): JsonResponse
    {
        $logger->error($e->getMessage(), [
            'exception_class' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        return response()->json([
            'message' => 'Error interno del servidor',
            'status' => HttpCodes::HTTP_INTERNAL_SERVER_ERROR,
            'code' => null,
            'errors' => true,
        ], HttpCodes::HTTP_INTERNAL_SERVER_ERROR);
    }
}
