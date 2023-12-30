<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\ContentType;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;
use Tekkl\Shared\Struct\Struct;

class RequestBody extends Struct
{
    protected bool $required;
    protected ContentType $contentType;
    protected ParameterType $type;
    protected ?ParameterCollection $parameters = null;

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function setRequired(bool $required): RequestBody
    {
        $this->required = $required;
        return $this;
    }

    public function getContentType(): ContentType
    {
        return $this->contentType;
    }

    public function setContentType(ContentType $contentType): RequestBody
    {
        $this->contentType = $contentType;
        return $this;
    }

    public function getType(): ParameterType
    {
        return $this->type;
    }

    public function setType(ParameterType $type): RequestBody
    {
        $this->type = $type;
        return $this;
    }

    public function getParameters(): ?ParameterCollection
    {
        return $this->parameters;
    }

    public function setParameters(?ParameterCollection $parameters): RequestBody
    {
        $this->parameters = $parameters;
        return $this;
    }
}