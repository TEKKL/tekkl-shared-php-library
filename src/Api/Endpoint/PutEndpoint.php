<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;
use Tekkl\Shared\Api\Request\RequestBody;
use Tekkl\Shared\Api\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Response\ResponseCollection;

abstract class PutEndpoint extends Endpoint
{
    public static function create(string $url, array $options = []): static
    {
        return parent::create($url, [
            ...$options,
            'methods' => [
                Method::PUT
            ]
        ]);
    }
}