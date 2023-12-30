<?php

namespace Tekkl\Shared\Struct;

class Struct implements \JsonSerializable, ExtendableInterface
{
    use VariablesAccessTrait;
    use JsonSerializableTrait;
    use ExtendableTrait;
    use CreateFromTrait;
    use CloneTrait;
    use AssignArrayTrait;
}