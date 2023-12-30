<?php

namespace Tekkl\Shared\Api\Schema\Request;

use Tekkl\Shared\Api\Schema\ContentType;
use Tekkl\Shared\Api\Schema\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Schema\Parameter\ParameterType;
use Tekkl\Shared\Struct\Struct;

class RequestBody extends Struct
{
    public function __construct(
        protected bool $required,
        protected ContentType $contentType,
        protected ParameterType $type,
        protected ?ParameterCollection $parameters = null,
    ) {}
}