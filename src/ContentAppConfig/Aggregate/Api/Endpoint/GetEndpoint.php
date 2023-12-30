<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\Method;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\MethodCollection;

abstract class GetEndpoint extends Endpoint
{
    public function __construct()
    {
        $this->setMethods(new MethodCollection(Method::GET));
    }
}