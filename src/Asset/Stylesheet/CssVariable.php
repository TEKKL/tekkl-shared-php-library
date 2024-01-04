<?php

namespace Tekkl\Shared\Asset\Stylesheet;

use Tekkl\Shared\Struct\Struct;

class CssVariable extends Struct
{
    protected string $name;
    protected string $value;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CssVariable
    {
        $this->name = $name;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): CssVariable
    {
        $this->value = $value;
        return $this;
    }
}