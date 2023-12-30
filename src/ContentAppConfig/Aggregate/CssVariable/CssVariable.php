<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\CssVariable;

use Tekkl\Shared\Struct\Struct;

class CssVariable extends Struct
{
    public function __construct(
       protected readonly string $name,
       protected readonly string $value,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}