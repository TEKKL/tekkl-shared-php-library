<?php

namespace Tekkl\Shared\Asset\Font;

use Tekkl\Shared\Struct\Struct;

class FontSource extends Struct
{
    protected string $url;
    protected string $format;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): FontSource
    {
        $this->url = $url;
        return $this;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): FontSource
    {
        $this->format = $format;
        return $this;
    }
}