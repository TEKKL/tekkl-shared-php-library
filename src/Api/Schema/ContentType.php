<?php

namespace Tekkl\Shared\Api\Schema;

enum ContentType: string
{
    case APPLICATION_JSON = 'application/json';
    case APPLICATION_XML = 'application/xml';
    case APPLICATION_X_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';
    case MULTIPART_FORM_DATA = 'multipart/form-data';
}