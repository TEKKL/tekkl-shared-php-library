<?php

namespace Tekkl\Shared\Api\Response;

use Tekkl\Shared\Api\ContentType;
use Tekkl\Shared\Api\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Parameter\ParameterType;
use Tekkl\Shared\Struct\Struct;

class ResponseContent extends Struct
{
    protected ContentType $contentType;
    protected ParameterType $type;
    protected ?ParameterCollection $properties = null;

    public function getContentType(): ContentType
    {
        return $this->contentType;
    }

    public function setContentType(ContentType $contentType): ResponseContent
    {
        $this->contentType = $contentType;
        return $this;
    }

    public function getType(): ParameterType
    {
        return $this->type;
    }

    public function setType(ParameterType $type): ResponseContent
    {
        $this->type = $type;
        return $this;
    }

    public function getProperties(): ?ParameterCollection
    {
        return $this->properties;
    }

    public function setProperties(?ParameterCollection $properties): ResponseContent
    {
        $this->properties = $properties;
        return $this;
    }
}