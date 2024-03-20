<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;
use Tekkl\Shared\Api\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Response\ResponseCollection;

abstract class DeleteEndpoint extends Endpoint
{
    public function __construct()
    {
        $this->setMethods(new MethodCollection([Method::DELETE]));
    }
}