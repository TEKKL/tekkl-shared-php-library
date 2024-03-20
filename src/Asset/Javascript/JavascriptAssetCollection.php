<?php

namespace Tekkl\Shared\Asset\Javascript;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<JavascriptAsset>
 */
class JavascriptAssetCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return JavascriptAsset::class;
    }
}