<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\Parameter;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterFormat;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;

class RequestParameter extends Parameter
{
    protected RequestParameterLocation $in;

    public function __construct(
        string $name,
        ParameterType $type,
        ParameterFormat $format,
        RequestParameterLocation $in,
        bool $required,
        ?string $description = null,
        ?string $default = null,
        ?string $example = null,
        ?string $pattern = null
    ) {
        $this->in = $in;
        parent::__construct($name, $type, $format, $required, $description, $default, $example, $pattern);
    }

    public function getIn(): RequestParameterLocation
    {
        return $this->in;
    }

    public function setIn(RequestParameterLocation $in): void
    {
        $this->in = $in;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function setRequired(bool $required): void
    {
        $this->required = $required;
    }
}