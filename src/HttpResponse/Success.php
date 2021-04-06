<?php

/**
 * Rest Response
 *
 * @link        https://github.com/MelquesPaiva/rest-response for the canonical source repository
 * @copyright   Copyright (c) MelquesPaiva
 */

namespace MelquesPaiva\RestResponse\HttpResponse;

/**
 * Class Success
 * @package MelquesPaiva\RestResponse\HttpResponse
 */
class Success extends HttpResponse
{
    /**
     * The request has succeeded
     * 
     * @param string $message
     * @param array|null $data
     * @return Success
     */
    public function success(string $message, ?array $data = null): Success
    {
        $this->statusCode = 200;
        $this->message = $message;
        $this->data = $data;

        return $this;
    }

    /**
     * The server does not need to return an entity body
     *
     * @return Success
     */
    public function noContent(): Success
    {
        $this->statusCode = 204;

        return $this;
    }

    /**
     * @param string $nameDataParam
     * @return array
     */
    public function toArray(string $nameDataParam = "data"): array
    {
        return [
            "message" => $this->message,
            $nameDataParam => $this->data,
        ];
    }
}
