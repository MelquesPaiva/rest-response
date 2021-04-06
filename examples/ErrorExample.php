<?php

use MelquesPaiva\RestResponse\HttpResponse\Error;
use MelquesPaiva\RestResponse\Response;

require __DIR__ . '/../vendor/autoload.php';

/**
 * ErrorExample
 */
class ErrorExample
{
    /** @var Response $response */
    protected Response $response;

    /**
     * ErrorExample Constructor
     */
    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * Generate a 400 response
     *
     * @return void
     */
    public function badRequest(): void
    {
        $this->response->badRequest("The data passed to this request is not valid", "parameter_if_necessary");
    }

    /**
     * Generate a 401 response
     *
     * @return void
     */
    public function unauthorized(): void
    {
        $this->response->unauthorized(
            "You don't have authorization or you aren't authenticate to access this method",
            "parameter_if_necessary"
        );
    }

    /**
     * Generate a 403 response
     *
     * @return void
     */
    public function actionForbidden(): void
    {
        $this->response->actionForbidden(
            "The server understood the request, but you can't receive a succesfull response"
        );
    }
    
    /**
     * Generate a 404 response
     *
     * @return void
     */
    public function notFound(): void
    {
        $this->response->notFound("No information founded", "parameter_if_necessary");
    }

    /**
     * Generate a 405 response
     *
     * @return void
     */
    public function methodNotAllowed(): void
    {
        $this->response->methodNotAllowed(
            "The method with you trying to access this method is not allowed",
            "parameter_if_necessary"
        );
    }

    /**
     * Generate a 500 response
     *
     * @return void
     */
    public function internalError(): void
    {
        $this->response->internalError("Some errors occurred on the server side");
    }

    /**
     * Generate a 501 response
     *
     * @return void
     */
    public function methodNotImplemented(): void
    {
        $this->response->methodNotImplemented("This method still isn't impelemented");
    }

    /**
     * Method to simulate other error responses
     *
     * @param integer $statusCode
     * @param string $message
     * @param string $type
     * @return void
     */
    public function otherReturn(int $statusCode, string $message, string $type): void
    {
        $error = new Error();
        $error->setStatusCode($statusCode)
            ->setMessage($message)
            ->setType($type);

        echo $this->response->errorResponse($error);
    }
}

// $param = $_GET['param'];
// switch($param) {
//     case "bad_request":
//         (new ErrorExample())->badRequest();
//         break;
//     case "unauthorized":
//         (new ErrorExample())->unauthorized();
//         break;
//     case "action_forbidden":
//         (new ErrorExample())->actionForbidden();
//         break;
//     case "not_found":
//         (new ErrorExample())->notFound();
//         break;
//     case "method_not_allowed":
//         (new ErrorExample())->methodNotAllowed();
//         break;
//     case "internal_error":
//         (new ErrorExample())->internalError();
//         break;
//     case "method_not_implemented":
//         (new ErrorExample())->methodNotImplemented();
//         break;
//     default:
//         (new ErrorExample())->otherReturn(402, "message", "type");
//         break;
// }
