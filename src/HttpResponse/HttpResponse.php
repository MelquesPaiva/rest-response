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
abstract class HttpResponse
{
    /** @var int $statusCode */
    protected int $statusCode;

    /** @var string $message */
    protected string $message;

    /** @var array $data */
    protected array $data = [];

    /** @var string $type */
    protected string $type;

    /** @var string $parameter */
    protected string $parameter = "";

    /**
     * Request Status Code
     *
     * @param integer $statusCode
     * @return HttpResponse
     */
    public function setStatusCode(int $statusCode): HttpResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Get the value of statusCode
     * 
     * @return int
     */ 
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return HttpResponse
     */
    public function setMessage(string $message): HttpResponse
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the value of message
     * 
     * @return string
     */ 
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set data
     *
     * @param array $data
     * @return HttpResponse
     */
    public function setData(array $data): HttpResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get the value of data
     * 
     * @return array
     */ 
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set type
     *
     * @param array $type
     * @return HttpResponse
     */
    public function setType(string $type): HttpResponse
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the value of type
     * 
     * @return string
     */ 
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set parameter
     *
     * @param array $parameter
     * @return HttpResponse
     */
    public function setParameter(string $parameter): HttpResponse
    {
        $this->parameter = $parameter;
        return $this;
    }

    /**
     * Get the value of parameter
     * 
     * @return string
     */ 
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Class to array
     *
     * @return array
     */
    public abstract function toArray(): array;
}
