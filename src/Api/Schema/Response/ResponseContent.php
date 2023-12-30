<?php

namespace Tekkl\Shared\Api\Schema\Response;

use Tekkl\Shared\Api\Schema\ContentType;
use Tekkl\Shared\Api\Schema\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Schema\Parameter\ParameterType;
use Tekkl\Shared\Struct\Struct;

class ResponseContent extends Struct
{
    public function __construct(
        protected ContentType $contentType,
        protected ParameterType $type,
        protected ?ParameterCollection $properties = null,
    ) {}
}