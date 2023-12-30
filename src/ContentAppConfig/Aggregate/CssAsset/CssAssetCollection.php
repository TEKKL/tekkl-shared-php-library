<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\CssAsset;

use Tekkl\Shared\Struct\Collection;

class CssAssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return CssAsset::class;
    }
}