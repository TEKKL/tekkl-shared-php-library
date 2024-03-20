<?php

namespace Tekkl\Shared\Struct;

use ReflectionClass;

/**
 * @template TElement
 * @implements \IteratorAggregate<array-key, TElement>
 */
abstract class Collection extends Struct implements \IteratorAggregate, \Countable
{
    /**
     * @var array<array-key, TElement>
     */
    protected array $elements = [];

    /**
     * @param array<TElement> $elements
     */
    final public function __construct(iterable $elements = [])
    {
        foreach ($elements as $key => $element) {
            $this->set($key, $element);
        }
    }

    /**
     * @param TElement $element
     */
    public function add($element): void
    {
        $this->validateType($element);

        $this->elements[] = $element;

    }

    /**
     * @param array-key|null $key
     * @param TElement $element
     */
    public function set($key, $element): void
    {
        $this->validateType($element);

        if ($key === null) {
            $this->elements[] = $element;
        } else {
            $this->elements[$key] = $element;
        }
    }

    /**
     * @param Collection<TElement> $collection
     */
    public function merge(self $collection): void
    {
        /** @var TElement $entity */
        foreach ($collection as $entity) {
            $this->add($entity);
        }
    }

    /**
     * @param array-key $key
     *
     * @return TElement|null
     */
    public function get(string|int $key)
    {
        if ($this->has($key)) {
            return $this->elements[$key];
        }

        return null;
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    public function count(): int
    {
        return \count($this->elements);
    }

    /**
     * @return list<array-key>
     */
    public function getKeys(): array
    {
        return array_keys($this->elements);
    }

    /**
     * @param array-key $key
     */
    public function has(string|int $key): bool
    {
        return \array_key_exists($key, $this->elements);
    }

    /**
     * @return array
     */
    public function map(\Closure $closure): array
    {
        return array_map($closure, $this->elements);
    }

    /**
     * @param  mixed|null        $initial
     *
     * @return mixed|null
     */
    public function reduce(\Closure $closure, mixed $initial = null)
    {
        return array_reduce($this->elements, $closure, $initial);
    }

    /**
     * @return array<array-key, mixed>
     */
    public function fmap(\Closure $closure): array
    {
        return array_filter($this->map($closure));
    }

    public function sort(\Closure $closure): void
    {
        uasort($this->elements, $closure);
    }

    /**
     * @param class-string $class
     *
     * @return static
     */
    public function filterInstance(string $class): static
    {
        return $this->filter(static function ($item) use ($class) {
            return $item instanceof $class;
        });
    }

    /**
     * @return static
     */
    public function filter(\Closure $closure): static
    {
        return $this->createNew(array_filter($this->elements, $closure));
    }

    /**
     * @return static
     */
    public function slice(int $offset, ?int $length = null): static
    {
        return $this->createNew(\array_slice($this->elements, $offset, $length, true));
    }

    /**
     * @return array<TElement>
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    public function jsonSerialize(array $options = []): array
    {
        return $this->jsonSerializeConvertArray($this->elements, $options);
    }

    /**
     * return ($this->elements is non-empty-array ? TElement : null) does not work as return type for now.
     * Possible with PHPStan 1.9.0 see https://github.com/phpstan/phpstan/issues/7110
     */
    public function first(): ?Struct
    {
        return array_values($this->elements)[0] ?? null;
    }

    /**
     * @return TElement|null
     */
    public function getAt(int $position)
    {
        return array_values($this->elements)[$position] ?? null;
    }

    /**
     * return ($this->elements is non-empty-array ? TElement : null) does not work as return type for now.
     * Possible with PHPStan 1.9.0 see https://github.com/phpstan/phpstan/issues/7110
     */
    public function last(): ?Struct
    {
        return array_values($this->elements)[\count($this->elements) - 1] ?? null;
    }

    /**
     * @param array-key $key
     */
    public function remove(string|int $key): void
    {
        unset($this->elements[$key]);
    }

    /**
     * @deprecated tag:v6.5.0 - reason:return-type-change - Return type will be changed to \Traversable
     *
     * @return \Generator<TElement>
     */
    #[\ReturnTypeWillChange]
    public function getIterator(): \Generator/* :\Traversable */
    {
        yield from $this->elements;
    }

    /**
     * @return class-string<TElement>|null
     */
    protected function getExpectedClass(): ?string
    {
        return null;
    }

    /**
     * @param iterable<TElement> $elements
     *
     * @return static
     */
    protected function createNew(iterable $elements = []): static
    {
        return new static($elements);
    }

    /**
     * @param TElement $element
     */
    protected function validateType($element): void
    {
        $expectedClass = $this->getExpectedClass();
        if ($expectedClass === null) {
            return;
        }

        if (!$element instanceof $expectedClass) {
            $elementClass = \get_class($element);

            throw new \InvalidArgumentException(
                sprintf('Expected collection element of type %s got %s', $expectedClass, $elementClass)
            );
        }
    }

    /**
     * @param array<array-key, mixed> $options
     */
    public function assign(array $options): static
    {
        $this->elements = [];
        $isStruct = false;
        $isEnum = false;
        if ($this->getExpectedClass()) {
            $isStruct = is_subclass_of($this->getExpectedClass(), Struct::class);
            if (!$isStruct) {
                $reflectionClass = new ReflectionClass($this->getExpectedClass());
                $isEnum = $reflectionClass->isEnum();
            }
        }
        foreach ($options as $key => $element) {
            if ($isStruct) {
                $struct = new ($this->getExpectedClass());
                $struct->assign($element);
                $element = $struct;
            }
            if ($isEnum) {
                /** @phpstan-ignore-next-line */
                $element = $this->getExpectedClass()::from($element);
            }
            $this->set($key, $element);
        }
        return $this;
    }
}