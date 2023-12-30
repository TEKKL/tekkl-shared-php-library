<?php

namespace Tekkl\Shared\Api\Schema\Request;

use Tekkl\Shared\Struct\Collection;

class MethodCollection extends Collection
{
    public function __construct(Method ...$methods)
    {
        parent::__construct($methods);
    }

    protected function getExpectedClass(): ?string
    {
        return Method::class;
    }
}