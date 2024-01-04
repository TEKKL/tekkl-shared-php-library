<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;
use Tekkl\Shared\Api\Request\RequestBody;
use Tekkl\Shared\Api\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Response\ResponseCollection;

abstract class PutEndpoint extends Endpoint
{
    public function __construct(
        protected string $url,
        RequestParameterCollection $parameters,
        RequestBody $body,
        ResponseCollection $responses,
    ) {
        parent::__construct(
            $url,
            new MethodCollection(Method::PUT),
            $responses,
            $parameters,
            $body
        );
    }
}