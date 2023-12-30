<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter;

use Tekkl\Shared\Struct\Collection;

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