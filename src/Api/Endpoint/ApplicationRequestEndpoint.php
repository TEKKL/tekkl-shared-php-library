<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;
use Tekkl\Shared\Api\Response\Response;
use Tekkl\Shared\Api\Response\ResponseCollection;

final class ApplicationRequestEndpoint extends Endpoint
{
    public function __construct()
    {
        $this->setMethods(new MethodCollection(Method::GET, Method::POST, Method::PUT, Method::DELETE));

        $this->setResponses(new ResponseCollection([(new Response())
            ->setStatusCode(200)
            ->setDescription('Depending on the request, the response will be different.')]));
    }
}