<?php

namespace Tekkl\Shared\Api\Schema\Endpoint;

use Tekkl\Shared\Api\Schema\Request\Method;
use Tekkl\Shared\Api\Schema\Request\MethodCollection;
use Tekkl\Shared\Api\Schema\Request\RequestBody;
use Tekkl\Shared\Api\Schema\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Schema\Response\ResponseCollection;
use Tekkl\Shared\Struct\Struct;

abstract class Endpoint extends Struct
{
    public function __construct(
        protected string $url,
        protected MethodCollection $methods,
        protected ResponseCollection $responses,
        protected ?RequestParameterCollection $parameters = null,
        protected ?RequestBody $body = null,
    ) {}

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