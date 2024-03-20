<?php

namespace Tekkl\Shared\Api\Parameter;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<Parameter>
 */
class ParameterCollection extends Collection
{
    /**
     * @param Parameter $element
     */
    public function add($element): void
    {
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): ?string
    {
        return Parameter::class;
    }
}