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

        $this->response->successful("The request was finish with success", $data);
    }

    /**
     * Method to simulate a successfull response with empty data to return (statusCode = 204)
     *
     * @return void
     */
    public function emptyDataReturn(): void
    {
        $this->response->noContent();
    }

    /**
     * Method to simulate other response int the 200 range
     *
     * @param integer $statusCode
     * @param string $message
     * @param string $type
     * @param array $data
     * @return void
     */
    public function otherReturn(int $statusCode, string $message, string $type, array $data = []): void
    {
        $success = new Success();
        $success->setStatusCode($statusCode)
            ->setMessage($message)
            ->setType($type)
            ->setData($data);

        echo $this->response->successfullResponse($success);
    }
}

// $param = $_GET['param'];
// switch($param) {
//     case "success":
//         (new SuccessExample())->successReturn();
//         return;
//     case "no_content":
//         (new SuccessExample())->emptyDataReturn();
//         return;
//     default:
//         (new SuccessExample())->otherReturn(203, "message", "type",["user" => "test"]);
//         return;
// }
