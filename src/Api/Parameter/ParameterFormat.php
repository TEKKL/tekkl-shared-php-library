<?php

namespace Tekkl\Shared\Api\Parameter;

enum ParameterFormat: string
{
    case STRING = 'string';
    case INT32 = 'int32';
    case INT64 = 'int64';
    case FLOAT = 'float';
    case DOUBLE = 'double';
    case BYTE = 'byte';
    case BINARY = 'binary';
    case DATE = 'date';
    case DATE_TIME = 'date-time';
    case PASSWORD = 'password';
    case EMAIL = 'email';
    case UUID = 'uuid';
    case URI = 'uri';
    case URL = 'url';
    case MIXED = 'mixed';
    case BOOLEAN = 'boolean';
    case OBJECT = 'object';
}