# rest-response
Project to manage Restfull Api's response

[![Maintainer](http://img.shields.io/badge/maintainer-@melquespaiva-blue.svg?style=flat-square)](https://instagram.com/melquespaiva?igshid=1iy3o4rdzfdrt)
[![Source Code](http://img.shields.io/badge/source-MelquesPaiva/rest-response-blue.svg?style=flat-square)](https://github.com/MelquesPaiva/rest-response)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/MelquesPaiva/rest-response.svg?style=flat-square)](https://packagist.org/packages/melquespaiva/rest-response)
[![Latest Version](https://img.shields.io/github/release/MelquesPaiva/rest-response.svg?style=flat-square)](https://github.com/MelquesPaiva/rest-response/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/MelquesPaiva/rest-response.svg?style=flat-square)](https://scrutinizer-ci.com/g/MelquesPaiva/rest-response)
[![Quality Score](https://img.shields.io/scrutinizer/g/MelquesPaiva/rest-response.svg?style=flat-square)](https://scrutinizer-ci.com/g/MelquesPaiva/rest-response)
[![Total Downloads](https://img.shields.io/packagist/dt/MelquesPaiva/rest-response.svg?style=flat-square)](https://packagist.org/packages/cMelquesPaiva/rest-response)

###### Rest Response is an easy and optimized small library to manage your HTTP responses on your Api's RestFull

Rest Response é uma pequena biblioteca fácil e otimizada para gerenciar suas respostas HTTP nas suas Api's RestFull

### Highlights

- Simple installation (Instalação simples)
- Optimized responses to major HTTP response codes (Respostas otimizadas para os principais códigos de resposta HTTP)
- Easy way to customize response for HTTP Response Code not implemented in the library (Uma maneira fácil de personalizar a resposta para o código de resposta HTTP não implementado na biblioteca)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"melquespaiva/rest-response": "^1.0"
```

or run

```bash
composer require melquespaiva/rest-response
```

## Documentation

###### For details on how to use, see a sample folder in the component directory.

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente.

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

$response = new Response();

// call response statusCode 200
$data = [
    "user" => [
        "name" => "Melques",
        "last_name" => "Paiva",
        "document" => "123456456"                
    ]
];

$response->successful("The request was finish with success", $data);

// call response statusCode 204
$response->noContent();

// call response other to other statusCode, but still a successfull response
$success = new Success();
$success->setStatusCode(203)
    ->setData(["user" => "Melques Paiva"])
    ->setMessage("A generic message")
    ->setType("generic_type");

echo $response->successfullResponse($success);

// call response with statusCode 400
$response->badRequest("The data passed to this request is not valid", "parameter_if_necessary");

// call response with statusCode 401
$response->unauthorized(
    "You don't have authorization or you aren't authenticate to access this method",
    "parameter_if_necessary"
);

// call response with statusCode 403
$response->actionForbidden(
    "The server understood the request, but you can't receive a succesfull response"
);

// call response with statusCode 404
$response->notFound("No information founded", "parameter_if_necessary");

// call response with statusCode 405
$response->methodNotAllowed(
    "The method with you trying to access this method is not allowed",
    "parameter_if_necessary"
);

// call response with statusCode 500
$response->internalError("Some errors occurred on the server side");

// call response with statusCode 501
$response->methodNotImplemented("This method still isn't impelemented");

// call response on a other statusCode error
$error = new Error();
$error->setStatusCode(402)
    ->setMessage("Payment Required")
    ->setType("payment_required");

echo $response->errorResponse($error)

?>

```
## Contributing

Please see [CONTRIBUTING](https://github.com/MelquesPaiva/rest-response/blob/main/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email melque1703@gmail.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para melque1703@gmail.com em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Melques S. Paiva](https://github.com/MelquesPaiva) (Developer)
- [All Contributors](https://github.com/MelquesPaiva/rest-response/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/MelquesPaiva/rest-response/blob/main/LICENSE) for more information.
