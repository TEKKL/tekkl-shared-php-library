<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter;

use Tekkl\Shared\Struct\Struct;

class Parameter extends Struct
{
    public function __construct(
        protected string $name,
        protected ParameterType $type,
        protected ParameterFormat $format,
        protected ?bool $required,
        protected ?string $description = null,
        protected ?string $default = null,
        protected ?string $example = null,
        protected ?string $pattern = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): ParameterType
    {
        return $this->type;
    }

    public function setType(ParameterType $type): void
    {
        $this->type = $type;
    }

    public function getFormat(): ParameterFormat
    {
        return $this->format;
    }

    public function setFormat(ParameterFormat $format): void
    {
        $this->format = $format;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDefault(): ?string
    {
        return $this->default;
    }

    public function setDefault(?string $default): void
    {
        $this->default = $default;
    }

    public function getExample(): ?string
    {
        return $this->example;
    }

    public function setExample(?string $example): void
    {
        $this->example = $example;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(?string $pattern): void
    {
        $this->pattern = $pattern;
    }
}