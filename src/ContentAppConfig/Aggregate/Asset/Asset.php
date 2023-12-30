<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Asset;

use Tekkl\Shared\Struct\Struct;

class Asset extends Struct
{
    protected string $type = 'unknown';
    protected string $name;
    protected string $url;

    public function __construct(
        string $name,
        string $url,
        ?string $type = null
    ) {
        $this->name = $name;
        $this->url = $url;
        $this->type = $type ?? $this->type;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}