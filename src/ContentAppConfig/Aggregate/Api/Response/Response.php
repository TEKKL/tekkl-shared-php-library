<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response;

use Tekkl\Shared\Struct\Struct;

class Response extends Struct
{
    public function __construct(
        protected int $statusCode,
        protected string $description,
        protected ?ResponseContent $content = null,
    ) {}

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getContent(): ?ResponseContent
    {
        return $this->content;
    }

    public function setContent(?ResponseContent $content): void
    {
        $this->content = $content;
    }
}