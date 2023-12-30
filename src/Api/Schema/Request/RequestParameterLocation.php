<?php

namespace Tekkl\Shared\Api\Schema\Request;

enum RequestParameterLocation: string
{
    case PATH = 'path';
    case QUERY = 'query';
    case HEADER = 'header';
    case COOKIE = 'cookie';
}