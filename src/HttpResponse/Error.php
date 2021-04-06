<?php

/**
 * Rest Response
 *
 * @link        https://github.com/MelquesPaiva/rest-response for the canonical source repository
 * @copyright   Copyright (c) MelquesPaiva
 */

namespace MelquesPaiva\RestResponse\HttpResponse;

/**
 * Class Error
 * @package MelquesPaiva\RestResponse\Rest
 */
class Error extends HttpResponse
{
    /**
     * The request could not be understood by the server
     * 
     * @param string $message
     * @param string $parameter
     * @return $this
     */
    public function badRequest(string $message, string $parameter): Error
    {
        $this->message = $message;
        $this->statusCode = 400;
        $this->type = "bad_request";
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Request requires user authentication
     * 
     * @param string $parameter
     * @param string $message
     * @return $this
     */
    public function unauthorized(string $message, string $parameter): Error
    {
        $this->message = $message;
        $this->statusCode = 401;
        $this->type = "unauthorized";
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * The server refuse to fulfill the request
     * 
     * @param string $message
     * @return $this
     */
    public function actionForbidden(string $message): Error
    {
        $this->message = $message;
        $this->statusCode = 403;
        $this->type = "action_forbidden";

        return $this;
    }

    /**
     * The server has not found anything matching the Request-URI
     *
     * @param string $message
     * @param string $parameter
     * @return Error
     */
    public function notFound(string $message, string $parameter): Error
    {
        $this->message = $message;
        $this->statusCode = 404;
        $this->type = "not_found";
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * The method specified in the Request is not allowed for the resource
     *
     * @param string $message
     * @param string $parameter
     * @return Error
     */
    public function methodNotAllowed(string $message, string $parameter): Error
    {
        $this->message = $message;
        $this->statusCode = 405;
        $this->type = "method_not_allowed";
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * The server encountered an unexpected condition
     * 
     * @param string $message
     * @return $this
     */
    public function internalError(string $message): Error
    {
        $this->message = $message;
        $this->statusCode = 500;
        $this->type = "internal_error";

        return $this;
    }

    /**
     * The server does not support the functionality required to fulfill the request
     * 
     * @param string $message
     * @return $this
     */
    public function notImplemented(string $message): Error
    {
        $this->message = $message;
        $this->statusCode = 501;
        $this->type = "not_implemented";

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
            'statusCode' => $this->statusCode,
            'parameter' => $this->parameter,
            'data' => $this->data
        ];
    }
}
