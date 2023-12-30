<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\CssAsset;

use Tekkl\Shared\ContentAppConfig\Aggregate\Asset\Asset;

class CssAsset extends Asset
{
    protected string $version;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }
}