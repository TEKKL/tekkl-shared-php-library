<?php

namespace Tekkl\Shared\Api\Schema\Request;

enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
}