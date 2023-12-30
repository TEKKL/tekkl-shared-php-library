<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

enum RequestParameterLocation: string
{
    case PATH = 'path';
    case QUERY = 'query';
    case HEADER = 'header';
    case COOKIE = 'cookie';
}