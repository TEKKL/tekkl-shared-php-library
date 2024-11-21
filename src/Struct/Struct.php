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

    public static function createFromJsonFile(string $file): ?static
    {
        if (!file_exists($file)) {
            return null;
        }
        $json = file_get_contents($file);
        if (!$json) {
            return null;
        }
        if (false === $data = json_decode($json, true)) {
            return null;
        }
        /** @phpstan-ignore-next-line  */
        $class = new static();
        $class->assign($data);
        return $class;
    }
}