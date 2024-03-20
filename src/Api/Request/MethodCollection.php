<?php

namespace Tekkl\Shared\Api\Request;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<Method>
 */
class MethodCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return Method::class;
    }
}