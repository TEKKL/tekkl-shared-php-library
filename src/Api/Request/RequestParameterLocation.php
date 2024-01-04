<?php

namespace Tekkl\Shared\Api\Request;

enum RequestParameterLocation: string
{
    case PATH = 'path';
    case QUERY = 'query';
    case HEADER = 'header';
    case COOKIE = 'cookie';
}