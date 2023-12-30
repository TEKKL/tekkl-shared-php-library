<?php

namespace Tekkl\Shared\Struct;

use DateTimeInterface;
use DateTimeImmutable;
use ReflectionClass;
use ReflectionEnum;
use Throwable;

trait AssignArrayTrait
{
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

    protected function convertToTypedValues(array &$options): void
    {
        $reflectionClass = new ReflectionClass(static::class);
        foreach ($reflectionClass->getProperties() as $property) {
            $type = $property->getType();
            // Convert DateTimeInterface strings to DateTimeImmutable objects
            if ($type?->getName() === DateTimeInterface::class && is_string($options[$property->getName()])) {
                $options[$property->getName()] = new DateTimeImmutable($options[$property->getName()]);;
            }
            // We are done dealing with built-in types
            if ($type?->isBuiltin() !== false) {
                continue;
            }
            // Convert arrays to Structs
            $reflectionType = new ReflectionClass($type->getName());
            if (is_subclass_of($reflectionType->getName(), Struct::class) && is_array($options[$property->getName()])) {
                $struct = new ($type->getName());
                $struct->assign($options[$property->getName()]);
                $options[$property->getName()] = $struct;
            }
            // Convert enum values to enums
            if ($reflectionType->isEnum()) {
                $reflectionEnum = new ReflectionEnum($type->getName());
                if ($reflectionEnum->getBackingType() !== null) {
                    $options[$property->getName()] = $type->getName()::from($options[$property->getName()]);
                }
            }
        }
    }
}
