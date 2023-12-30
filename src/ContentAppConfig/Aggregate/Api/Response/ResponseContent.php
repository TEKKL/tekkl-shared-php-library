<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\ContentType;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;
use Tekkl\Shared\Struct\Struct;

class ResponseContent extends Struct
{
    public function __construct(
        protected ContentType $contentType,
        protected ParameterType $type,
        protected ?ParameterCollection $properties = null,
    ) {}
}