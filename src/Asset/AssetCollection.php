<?php

namespace Tekkl\Shared\Asset;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<Asset>
 */
class AssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return Asset::class;
    }
}