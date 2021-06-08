<?php

/**
 * Rest Response
 *
 * @link        https://github.com/MelquesPaiva/rest-response for the canonical source repository
 * @copyright   Copyright (c) MelquesPaiva
 */

namespace MelquesPaiva\RestResponse;

use MelquesPaiva\RestResponse\HttpResponse\Error;
use MelquesPaiva\RestResponse\HttpResponse\Success;

/**
 * Class Response
 * @package MelquesPaiva\RestResponse
 */
class Response
{
    /** @var Error */
    protected Error $error;

    /** @var Success */
    protected Success $success;

    /**
     * Response Constructor
     */
    public function __construct()
    {
        $this->error = new Error();
        $this->success = new Success();
    }

    /**
     * Function responsible for bad request errors (statusCode = 400)
     * 
     * @param string $message
     * @param string $parameter
     * @return void
     */
    public function badRequest(string $message, string $parameter = ""): void
    {
        echo $this->errorResponse($this->error->badRequest($message, $parameter));
    }

    /**
     * Function responsible for handle authentication errors (statusCode = 401)
     * 
     * @param string $parameter
     * @param string $message
     * @return void
     */
    public function unauthorized(string $message, string $parameter = ""): void 
    {
        echo $this->errorResponse($this->error->unauthorized($message, $parameter));
    }

    /**
     * Function responsible for handle action_forbidden errors (statusCode = 403)
     * 
     * @param string $message
     * @return void
     */
    public function actionForbidden(string $message): void
    {
        echo $this->errorResponse($this->error->actionForbidden($message));
    }

    /**
     * Function responsible for notFound data response (statusCode = 404)
     *
     * @param string $message
     * @param string $paramenter
     * @return void
     */
    public function notFound(string $message, string $paramenter = ""): void
    {
        echo $this->errorResponse($this->error->notFound($message, $paramenter));
    }

    /**
     * Function responsible for method not allowed errors (statusCode = 405)
     * 
     * @return void
     */
    public function methodNotAllowed(string $message, string $parameter = ""): void
    {
        echo $this->errorResponse($this->error->methodNotAllowed($message, $parameter));
    }

    /**
     * Function responsible for internal errors (statusCode = 500)
     * 
     * @param string $message
     * @return void
     */
    public function internalError(string $message): void
    {
        echo $this->errorResponse($this->error->internalError($message));
    }

    /**
     * Function responsible for methodNotImplemented errors (statusCode = 501)
     * 
     * @param string $message
     * @return void
     */
    public function methodNotImplemented(string $message): void
    {
        echo $this->errorResponse($this->error->notImplemented($message));
    }

    /**
     * Function responsible for successful responses (statusCode = 200)
     * 
     * @param string $message
     * @param array $data
     * @return void
     */
    public function successful(string $message, array $data = []): void
    {
        echo $this->successfullResponse($this->success->success($message, $data));
    }

    /**
     * Function responsible for handle responses where nothing is found (statusCode = 204)
     * 
     * @return void
     */
    public function noContent(): void
    {
        echo $this->successfullResponse($this->success->noContent());
    }

    /**
     * Handle successfull responses
     *
     * @param Success $success
     * @return string
     */
    public function successfullResponse(Success $success): string
    {
        $return = $success->toArray();

        $return["meta"] = [
            "status" => $success->getStatusCode(),
            "url" => filter_input(INPUT_SERVER, 'REQUEST_URI'),
            "method" => filter_input(INPUT_SERVER, 'REQUEST_METHOD'),
            "error" => null
        ];

        return $this->httpResponse($return, $success->getStatusCode());
    }

    /**
     * Handle Error Responses
     *
     * @param Error $error
     * @return string
     */
    public function errorResponse(Error $error): string
    {
        $return = [];
        $return["meta"] = [
            "status" => $error->getStatusCode(),
            "url" => filter_input(INPUT_SERVER, 'REQUEST_URI'),
            "method" => filter_input(INPUT_SERVER, 'REQUEST_METHOD'),
            "error" => $error->toArray()
        ];

        return $this->httpResponse($return, $error->getStatusCode());
    }

    /**
     * Function responsible to manage http responses
     *
     * @param array $return
     * @param int $statusCode
     * @return string
     */
    protected function httpResponse(array $return, int $statusCode): string
    {
        http_response_code($statusCode);
        return json_encode($return, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
