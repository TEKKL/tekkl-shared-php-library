<?php

namespace Tekkl\Shared\Asset\Stylesheet;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<CssVariable>
 */
class CssVariableCollection extends Collection
{
    /**
     * @param CssVariable $element
     */
    public function add($element): void
    {
        $this->validateType($element);
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): string
    {
        return CssVariable::class;
    }
}