<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\CssVariable;

use Tekkl\Shared\Struct\Collection;

class CssVariableCollection extends Collection
{
    protected function getExpectedClass(): string
    {
        return CssVariable::class;
    }
}