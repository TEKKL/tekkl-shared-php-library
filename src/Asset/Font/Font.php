<?php

namespace Tekkl\Shared\Asset\Font;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<FontVariant>
 */
class Font extends Collection
{
    protected function getExpectedClass(): string
    {
        return FontVariant::class;
    }
}