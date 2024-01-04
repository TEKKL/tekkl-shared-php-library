<?php

namespace Tekkl\Shared\Api\Request;

use Tekkl\Shared\Api\Parameter\Parameter;
use Tekkl\Shared\Api\Parameter\ParameterFormat;
use Tekkl\Shared\Api\Parameter\ParameterType;

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