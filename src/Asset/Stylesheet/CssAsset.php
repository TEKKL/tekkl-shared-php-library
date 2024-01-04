<?php

namespace Tekkl\Shared\Asset\Stylesheet;

use Tekkl\Shared\Asset\Asset;

class CssAsset extends Asset
{
    protected string $version;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): CssAsset
    {
        $this->version = $version;
        return $this;
    }
}