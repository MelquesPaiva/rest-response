<?php

use MelquesPaiva\RestResponse\HttpResponse\Success;
use MelquesPaiva\RestResponse\Response;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class SuccessExample
 */
class SuccessExample
{
    /** @var Response $response */
    protected Response $response;

    /**
     * SuccessExample Constructor
     */
    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * Method to simulate a succesfull response (statusCode = 200)
     *
     * @return void
     */
    public function successReturn(): void
    {
        $data = [
            "user" => [
                "name" => "Melques",
                "last_name" => "Paiva",
                "document" => "123456456"                
            ]
        ];

        echo $this->response->successful("The request was finish with success", $data);
    }

    /**
     * Method to simulate a successfull response with empty data to return (statusCode = 204)
     *
     * @return void
     */
    public function emptyDataReturn(): void
    {
        echo $this->response->noContent();
    }

    /**
     * Method to simulate other response int the 200 range
     *
     * @return void
     */
    public function otherReturn(int $statusCode, array $data, string $message, string $type): void
    {
        $success = new Success();
        $success->setStatusCode($statusCode)
            ->setData($data)
            ->setMessage($message)
            ->setType($type);

        echo $this->response->successfullResponse($success);
    }
}
