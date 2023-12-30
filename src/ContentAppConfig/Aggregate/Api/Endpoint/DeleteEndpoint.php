<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\Method;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\MethodCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseCollection;

abstract class DeleteEndpoint extends Endpoint
{
    public function __construct(
        protected string $url,
        RequestParameterCollection $parameters,
        ResponseCollection $responses,
    ) {
        parent::__construct(
            $url,
            new MethodCollection(Method::DELETE),
            $responses,
            $parameters
        );
    }
}