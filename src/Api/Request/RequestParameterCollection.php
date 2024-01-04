<?php

namespace Tekkl\Shared\Api\Request;

use Tekkl\Shared\Api\Parameter\ParameterCollection;

class RequestParameterCollection extends ParameterCollection
{
    protected function getExpectedClass(): ?string
    {
        return RequestParameter::class;
    }
}