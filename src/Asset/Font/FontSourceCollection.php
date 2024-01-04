<?php

namespace Tekkl\Shared\Asset\Font;

use Tekkl\Shared\Struct\Collection;

class FontSourceCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return FontSource::class;
    }
}