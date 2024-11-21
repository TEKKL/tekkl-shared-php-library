<?php

namespace Tekkl\Workspace\Api\Route\Resource;

use OpenApi\Annotations as OA;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class ResourcesResolveEndpoint extends PostEndpoint
{
    public function createOpenApiSchema(): OA\PathItem
    {
        $options = [
            'path' => $this->url,
            'post' => new OA\Post([
                'tags' => ['resources-resolve'],
                'summary'     => 'Resolves the resources of an element',
                'description' => 'This endpoint returns the resolved resources of an element, containing source data that allows you to embed these resources',
                'requestBody' => new OA\RequestBody([
                    'required' => true,
                    'content'  => [
                        'application/json' => new OA\MediaType([
                            'schema' => new OA\Schema([
                                'type'       => 'object',
                                'required'   => [AccessTokenInterface::PARAM_ACCESS_TOKEN],
                                'properties' => [
                                    new OA\Property([
                                        'property' => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                                        'type'     => 'string',
                                        'format'   => 'string',
                                        'description' => 'Access token for authentication.',
                                    ])
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