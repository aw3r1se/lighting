<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(version: '1.0', title: 'Application')]
#[OA\PathItem(path: 'api/docs')]
#[OA\SecurityScheme(
    securityScheme: 'auth',
    type: 'http',
    scheme: 'Bearer',
)]
#[OA\OpenApi(
    security: [['auth' => []]]
)]
abstract class Controller
{
    //
}
