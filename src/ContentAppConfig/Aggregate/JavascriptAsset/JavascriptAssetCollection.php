<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\JavascriptAsset;

use Tekkl\Shared\Struct\Collection;

class JavascriptAssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return JavascriptAsset::class;
    }
}