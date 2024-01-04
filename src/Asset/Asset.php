<?php

namespace Tekkl\Shared\Asset;

use Tekkl\Shared\Struct\Struct;

class Asset extends Struct
{
    protected string $type = 'unknown';
    protected string $name;
    protected string $url;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Asset
    {
        $this->type = $type;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Asset
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Asset
    {
        $this->url = $url;
        return $this;
    }
}