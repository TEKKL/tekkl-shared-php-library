<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;

abstract class GetEndpoint extends Endpoint
{
    /**
     * @param array<array-key, mixed> $options
     */
    public static function create(string $url, array $options = []): static
    {
        return parent::create($url, [
            ...$options,
            'methods' => [
                Method::GET
            ]
        ]);
    }
}