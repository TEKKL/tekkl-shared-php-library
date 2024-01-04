<?php

namespace Tekkl\Shared\Api\Response;

use Tekkl\Shared\Struct\Struct;

class Response extends Struct
{
    protected int $statusCode;
    protected string $description;
    protected ?ResponseContent $content = null;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): Response
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Response
    {
        $this->description = $description;
        return $this;
    }

    public function getContent(): ?ResponseContent
    {
        return $this->content;
    }

    public function setContent(?ResponseContent $content): Response
    {
        $this->content = $content;
        return $this;
    }
}