<?php

namespace Tekkl\Shared\Api\Schema\Parameter;

enum ParameterType: string
{
    case STRING = 'string';
    case INTEGER = 'integer';
    case BOOLEAN = 'boolean';
    case ARRAY = 'array';
    case OBJECT = 'object';

    case MIXED = 'mixed';
}