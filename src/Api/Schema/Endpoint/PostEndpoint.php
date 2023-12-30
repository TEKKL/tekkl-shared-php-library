<?php

namespace Tekkl\Shared\Api\Schema\Endpoint;

use Tekkl\Shared\Api\Schema\Request\Method;
use Tekkl\Shared\Api\Schema\Request\MethodCollection;
use Tekkl\Shared\Api\Schema\Request\RequestBody;
use Tekkl\Shared\Api\Schema\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Schema\Response\ResponseCollection;

abstract class PostEndpoint extends Endpoint
{
    public function __construct(
        protected string $url,
        RequestParameterCollection $parameters,
        RequestBody $body,
        ResponseCollection $responses,
    ) {
        parent::__construct(
            $url,
            new MethodCollection(Method::POST),
            $responses,
            $parameters,
            $body
        );
    }
}