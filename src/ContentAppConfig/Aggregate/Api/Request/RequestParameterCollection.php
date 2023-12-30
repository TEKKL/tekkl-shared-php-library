<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterCollection;

class RequestParameterCollection extends ParameterCollection
{
    protected function getExpectedClass(): ?string
    {
        return RequestParameter::class;
    }
}