<?php

namespace Tekkl\Shared\Asset\Stylesheet;

use Tekkl\Shared\Struct\Collection;

class CssVariableCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return CssVariable::class;
    }
}