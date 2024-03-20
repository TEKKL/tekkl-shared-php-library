<?php

namespace Tekkl\Shared\Struct;

use DateTimeInterface;
use DateTimeImmutable;
use ReflectionClass;
use ReflectionEnum;
use Throwable;

trait AssignArrayTrait
{
    /**
     * @param array<array-key, mixed> $options
     */
    public function assign(array $options): static
    {
        $this->convertToTypedValues($options);
        foreach ($options as $key => $value) {
            if ($key === 'id' && method_exists($this, 'setId')) {
                $this->setId($value);
                continue;
            }
            try {
                $this->$key = $value; /* @phpstan-ignore-line */
            } catch (Throwable) {
                // Ignore unknown properties
            }
        }

        return $this;
    }

    /**
     * @param array<array-key, mixed> $options
     */
    protected function convertToTypedValues(array &$options): void
    {
        $reflectionClass = new ReflectionClass(static::class);
        foreach ($reflectionClass->getProperties() as $property) {
            $type = $property->getType();
            if (!$type instanceof \ReflectionNamedType) {
                continue;
            }
            // Convert DateTimeInterface strings to DateTimeImmutable objects
            if ($type->getName() === DateTimeInterface::class && is_string($options[$property->getName()] ?? null)) {
                $options[$property->getName()] = new DateTimeImmutable($options[$property->getName()]);;
            }
            if ($type->getName() === 'bool' && is_string($options[$property->getName()] ?? null)) {
                $options[$property->getName()] = (bool) $options[$property->getName()];
            }
            if ($type->getName() === 'int' && is_string($options[$property->getName()] ?? null)) {
                $options[$property->getName()] = (int) $options[$property->getName()];
            }
            if ($type->getName() === 'float' && is_string($options[$property->getName()] ?? null)) {
                $options[$property->getName()] = (float) $options[$property->getName()];
            }
            // We are done dealing with built-in types
            if ($type->isBuiltin() !== false) {
                continue;
            }
            // Convert arrays to Structs
            /** @phpstan-ignore-next-line */
            $reflectionType = new ReflectionClass($type->getName());
            if (is_subclass_of($reflectionType->getName(), Struct::class) && is_array($options[$property->getName()] ?? null)) {
                /** @var Struct $struct */
                $struct = new ($type->getName());
                $struct->assign($options[$property->getName()]);
                $options[$property->getName()] = $struct;
            }
            // Convert enum values to enums
            if ($reflectionType->isEnum() && isset($options[$property->getName()])) {
                /** @phpstan-ignore-next-line */
                $reflectionEnum = new ReflectionEnum($type->getName());
                if ($reflectionEnum->getBackingType() !== null) {
                    $options[$property->getName()] = $type->getName()::from($options[$property->getName()]);
                }
            }
        }
    }
}
