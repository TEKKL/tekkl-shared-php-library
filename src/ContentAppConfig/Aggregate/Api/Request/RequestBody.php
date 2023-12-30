<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\ContentType;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;
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