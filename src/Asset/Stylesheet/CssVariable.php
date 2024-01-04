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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}