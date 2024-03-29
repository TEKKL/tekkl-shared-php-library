<?php

namespace Tekkl\Shared\Asset\Stylesheet;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<CssAsset>
 */
class CssAssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return CssAsset::class;
    }
}