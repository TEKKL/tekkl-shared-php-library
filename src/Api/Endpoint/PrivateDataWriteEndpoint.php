<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;
use OpenApi\Annotations as OA;

final class PrivateDataWriteEndpoint extends PostEndpoint
{
    public function createOpenApiSchema(): OA\PathItem
    {
        $options = [
            'path' => $this->url,
            'post' => new OA\Post([
                'tags' => ['private-data-write'],
                'summary'     => 'Update PRIVATE element data with a given key (optional) and value',
                'description' => 'This endpoint allows you to update all or parts of your private element data, which is identified by a key.',
                'requestBody' => new OA\RequestBody([
                    'required' => true,
                    'content'  => [
                        'application/json' => new OA\MediaType([
                            'schema' => new OA\Schema([
                                'type'       => 'object',
                                'required'   => [AccessTokenInterface::PARAM_ACCESS_TOKEN, 'value'],
                                'properties' => [
                                    new OA\Property([
                                        'property' => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                                        'type'     => 'string',
                                        'format'   => 'string',
                                        'description' => 'Access token for authentication.',
                                    ]),
                                    new OA\Property([
                                        'property' => 'key',
                                        'type'     => 'string',
                                        'format'   => 'string',
                                        'description' => 'The key associated with the data.',
                                    ]),
                                    new OA\Property([
                                        'property' => 'value',
                                        'oneOf'    => [
                                            new OA\Schema(['type' => 'string']),
                                            new OA\Schema(['type' => 'number']),
                                            new OA\Schema(['type' => 'object']),
                                            new OA\Schema(['type' => 'array']),
                                            new OA\Schema(['type' => 'boolean']),
                                        ],
                                        'description' => 'The value to update, can be of any type.',
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
                                'schema' => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                            'description' => 'Indicates if the operation was successful.',
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
                                'schema' => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                            'description' => 'Indicates failure.',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                            'description' => 'Error message detailing what went wrong.',
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                    new OA\Response([
                        'response'    => 403,
                        'description' => 'User is not allowed to update the data',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'schema' => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                            'description' => 'Indicates failure.',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                            'description' => 'Error message stating the user lacks permissions.',
                                        ]),
                                    ],
                                ]),
                            ]),
                        ],
                    ]),
                    new OA\Response([
                        'response'    => 500,
                        'description' => 'Unable to save the data',
                        'content'     => [
                            'application/json' => new OA\MediaType([
                                'schema' => new OA\Schema([
                                    'type'       => 'object',
                                    'required'   => ['success', 'error'],
                                    'properties' => [
                                        new OA\Property([
                                            'property' => 'success',
                                            'type'     => 'boolean',
                                            'description' => 'Indicates failure.',
                                        ]),
                                        new OA\Property([
                                            'property' => 'error',
                                            'type'     => 'string',
                                            'description' => 'Error message indicating a server error.',
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