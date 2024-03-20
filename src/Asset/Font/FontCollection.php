<?php

namespace Tekkl\Shared\Asset\Font;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<Font>
 */
class FontCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return Font::class;
    }
}