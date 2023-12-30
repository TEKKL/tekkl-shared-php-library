<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\Parameter;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterFormat;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;

class RequestParameter extends Parameter
{
    protected RequestParameterLocation $in;

    public function getIn(): RequestParameterLocation
    {
        return $this->in;
    }

    public function setIn(RequestParameterLocation $in): RequestParameter
    {
        $this->in = $in;
        return $this;
    }
}