<?php

namespace Tekkl\Shared\Struct;

trait VariablesAccessTrait
{
    public function getVars(): array
    {
        return get_object_vars($this);
    }
}
