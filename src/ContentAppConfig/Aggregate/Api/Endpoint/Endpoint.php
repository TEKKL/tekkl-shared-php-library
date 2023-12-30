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

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }

    public function setMethods(MethodCollection $methods): void
    {
        $this->methods = $methods;
    }

    public function getResponses(): ResponseCollection
    {
        return $this->responses;
    }

    public function setResponses(ResponseCollection $responses): void
    {
        $this->responses = $responses;
    }

    public function getParameters(): ?RequestParameterCollection
    {
        return $this->parameters;
    }

    public function setParameters(?RequestParameterCollection $parameters): void
    {
        $this->parameters = $parameters;
    }

    public function getBody(): ?RequestBody
    {
        return $this->body;
    }

    public function setBody(?RequestBody $body): void
    {
        $this->body = $body;
    }
}