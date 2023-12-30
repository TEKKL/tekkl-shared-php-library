<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\Method;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\MethodCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestBody;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseCollection;

abstract class PostEndpoint extends Endpoint
{
    public function __construct()
    {
        $this->setMethods(new MethodCollection(Method::POST));
    }
}