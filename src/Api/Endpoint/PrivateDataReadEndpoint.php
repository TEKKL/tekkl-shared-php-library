<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;
use OpenApi\Annotations as OA;

final class PrivateDataReadEndpoint extends PostEndpoint
{
    public function createOpenApiSchema(): OA\PathItem
    {
        $options = [
            'path' => $this->url,
            'post' => new OA\Post([
                'tags' => ['private-data-read'],
                'summary'     => 'PRIVATE data read endpoint for content app elements',
                'description' => 'Private data can be used to enable backend features, like API access, etc. It should not be used for frontend features.',
                'requestBody' => new OA\RequestBody([
                    'required' => true,
                    'content'  => [
                        'application/json' => new OA\MediaType([
                            'mediaType' => 'application/json',
                            'schema'    => new OA\Schema([
                                'type'       => 'object',
                                'required'   => [AccessTokenInterface::PARAM_ACCESS_TOKEN],
                                'properties' => [
                                    new OA\Property([
                                        'property' => 'key',
                                        'type'     => 'string',
                                        'nullable' => true,
                                    ]),
                                    new OA\Property([
                                        'property' => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                                        'type'     => 'string',
                                    ]),
                                ],
                            ]),
                        ]),
                    ],
                ]),
                'responses' => [
                    new OA\Response([
                        'response'    => 200,
                        'description' => 'OK',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'mediaType' => 'application/json',
                                'schema'    => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'value'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                        ]),
                                        new OA\Property([
                                            'property' => 'key',
                                            'type'     => 'string',
                                            'nullable' => true,
                                        ]),
                                        new OA\Property([
                                            'property' => 'value',
                                            'nullable' => true,
                                            'oneOf'    => [
                                                new OA\Schema(['type' => 'string']),
                                                new OA\Schema(['type' => 'number']),
                                                new OA\Schema(['type' => 'object']),
                                                new OA\Schema(['type' => 'array']),
                                                new OA\Schema(['type' => 'boolean']),
                                            ],
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                    new OA\Response([
                        'response'    => 400,
                        'description' => 'Bad request. Missing or invalid parameters.',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'mediaType' => 'application/json',
                                'schema'    => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                    new OA\Response([
                        'response'    => 403,
                        'description' => 'User is not allowed to read the data',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'mediaType' => 'application/json',
                                'schema'    => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                    new OA\Response([
                        'response'    => 404,
                        'description' => 'Key not found',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'mediaType' => 'application/json',
                                'schema'    => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                ],
            ]),
        ];

        return new OA\PathItem($options);
    }
}