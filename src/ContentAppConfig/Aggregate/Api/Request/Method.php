<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request;

enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
}