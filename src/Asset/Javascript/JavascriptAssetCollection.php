<?php

namespace Tekkl\Shared\Asset\Javascript;

use Tekkl\Shared\Struct\Collection;

class JavascriptAssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return JavascriptAsset::class;
    }
}