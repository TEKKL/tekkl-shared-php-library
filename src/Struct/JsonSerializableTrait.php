<?php

namespace Tekkl\Shared\Struct;

trait JsonSerializableTrait
{
    public const OPTION_SKIP_NULL_VALUES = 'skipNullValues';
    public const OPTION_SKIP_EMPTY_ARRAYS = 'skipEmptyArrays';
    public const OPTION_SKIP_EMPTY_EXTENSIONS = 'skipEmptyExtensions';

    public function jsonSerialize(array $options = []): array
    {
        return $this->jsonSerializeConvertArray(get_object_vars($this), $options);
    }

    protected function jsonSerializeConvertArray(array $array, array $options): array
    {
        $toDelete = [];
        foreach ($array as $key => &$value) {
            $this->jsonSerializeConvertDateTimePropertyToJsonStringRepresentation($value);
            $this->jsonSerializeConvertEnumToValueRepresentation($value);
            $this->jsonSerializeConvertStructToArrayRepresentation($value, $options);
            if ($value === null && ($options[self::OPTION_SKIP_NULL_VALUES] ?? false)) {
                $toDelete[] = $key;
            }
            if ($value === [] && ($options[self::OPTION_SKIP_EMPTY_ARRAYS] ?? false)) {
                $toDelete[] = $key;
            }
            if ($key === 'extensions' && ($options[self::OPTION_SKIP_EMPTY_EXTENSIONS] ?? false) && $value === []) {
                $toDelete[] = $key;
            }
        }
        foreach (array_unique($toDelete) as $key) {
            unset($array[$key]);
        }
        return $array;
    }

    protected function jsonSerializeConvertDateTimePropertyToJsonStringRepresentation(&$value): void
    {
        if ($value instanceof \DateTimeInterface) {
            $value = $value->format(\DateTime::RFC3339_EXTENDED);
        }
    }

    protected function jsonSerializeConvertEnumToValueRepresentation(&$value): void
    {
        if ($value instanceof \BackedEnum) {
            $value = $value->value;
        }
    }

    protected function jsonSerializeConvertStructToArrayRepresentation(&$value, array $options): void
    {
        if ($value instanceof Struct) {
            $value = $value->jsonSerialize($options);
        }
    }
}
