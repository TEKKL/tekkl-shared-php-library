<?php

namespace Tekkl\Shared\Api\Schema\Request;

use Tekkl\Shared\Api\Schema\Parameter\ParameterCollection;

class RequestParameterCollection extends ParameterCollection
{
    protected function getExpectedClass(): ?string
    {
        return RequestParameter::class;
    }
}