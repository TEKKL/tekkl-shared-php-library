<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;

abstract class GetEndpoint extends Endpoint
{
    public function __construct()
    {
        $this->setMethods(new MethodCollection([Method::GET]));
    }
}