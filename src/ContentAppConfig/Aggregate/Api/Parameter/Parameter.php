<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter;

use Tekkl\Shared\Struct\Struct;

class Parameter extends Struct
{
    protected string $name;
    protected ParameterType $type;
    protected ParameterFormat $format;
    protected ?bool $required;
    protected ?string $description = null;
    protected ?string $default = null;
    protected ?string $example = null;
    protected ?string $pattern = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Parameter
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): ParameterType
    {
        return $this->type;
    }

    public function setType(ParameterType $type): Parameter
    {
        $this->type = $type;
        return $this;
    }

    public function getFormat(): ParameterFormat
    {
        return $this->format;
    }

    public function setFormat(ParameterFormat $format): Parameter
    {
        $this->format = $format;
        return $this;
    }

    public function getRequired(): ?bool
    {
        return $this->required;
    }

    public function setRequired(?bool $required): Parameter
    {
        $this->required = $required;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Parameter
    {
        $this->description = $description;
        return $this;
    }

    public function getDefault(): ?string
    {
        return $this->default;
    }

    public function setDefault(?string $default): Parameter
    {
        $this->default = $default;
        return $this;
    }

    public function getExample(): ?string
    {
        return $this->example;
    }

    public function setExample(?string $example): Parameter
    {
        $this->example = $example;
        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(?string $pattern): Parameter
    {
        $this->pattern = $pattern;
        return $this;
    }
}