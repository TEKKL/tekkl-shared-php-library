<?php

namespace Tekkl\Shared\Asset\Javascript;

use Tekkl\Shared\Asset\Asset;

class JavascriptAsset extends Asset
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