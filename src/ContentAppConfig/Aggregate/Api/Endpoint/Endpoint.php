<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\Method;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\MethodCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestBody;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseCollection;
use Tekkl\Shared\Struct\Struct;

abstract class Endpoint extends Struct
{
    protected string $url;
    protected MethodCollection $methods;
    protected ResponseCollection $responses;
    protected ?RequestParameterCollection $parameters = null;
    protected ?RequestBody $body = null;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Endpoint
    {
        $this->url = $url;
        return $this;
    }

    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }

    public function setMethods(MethodCollection $methods): Endpoint
    {
        $this->methods = $methods;
        return $this;
    }

    public function getResponses(): ResponseCollection
    {
        return $this->responses;
    }

    public function setResponses(ResponseCollection $responses): Endpoint
    {
        $this->responses = $responses;
        return $this;
    }

    public function getParameters(): ?RequestParameterCollection
    {
        return $this->parameters;
    }

    public function setParameters(?RequestParameterCollection $parameters): Endpoint
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getBody(): ?RequestBody
    {
        return $this->body;
    }

    public function setBody(?RequestBody $body): Endpoint
    {
        $this->body = $body;
        return $this;
    }
}