<?php

namespace Tekkl\Shared\Asset;

use Tekkl\Shared\Struct\Collection;

class AssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return Asset::class;
    }
}