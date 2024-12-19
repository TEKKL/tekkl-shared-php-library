<?php

namespace Tekkl\Shared\Api\Endpoint;

use OpenApi\Annotations as OA;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class ResourceListResolveEndpoint extends PostEndpoint
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
                                        'description' => 'Access token for authentication.',
                                    ]),
                                    new OA\Property([
                                        'property' => 'resourceList',
                                        'description' => 'A list of resources to resolve.',
                                        'type'     => 'array',
                                        'items' => new OA\Schema([
                                            'type'       => 'object',
                                            'required'   => ['resourceId', 'resourceType'],
                                            'properties' => [
                                                new OA\Property([
                                                    'property' => 'resourceId',
                                                    'type'     => 'string',
                                                    'description' => 'The ID of the resource to resolve.',
                                                ]),
                                                new OA\Property([
                                                    'property' => 'resourceType',
                                                    'type'     => 'string',
                                                    'description' => 'The type of the resource to resolve.',
                                                ])
                                            ]
                                        ])
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
                                        new OA\Property([
                                            'property' => 'resolvedResourceList',
                                            'type'     => 'array',
                                            'description' => 'A list of resolved resources.',
                                            'items' => new OA\Schema([
                                                'type'       => 'object',
                                                'required'   => ['resourceId', 'resourceType'],
                                                'properties' => [
                                                    new OA\Property([
                                                        'property' => 'resourceId',
                                                        'type'     => 'string',
                                                        'description' => 'The ID of the resource to resolve.',
                                                    ]),
                                                    new OA\Property([
                                                        'property' => 'resourceType',
                                                        'type'     => 'string',
                                                        'description' => 'The type of the resource to resolve.',
                                                    ]),
                                                    new OA\Property([
                                                        'property' => 'source',
                                                        'type'     => 'string',
                                                        'description' => 'The absolute source URL to use for this resource',
                                                    ]),
                                                    new OA\Property([
                                                        'property' => 'attributes',
                                                        'type'     => 'object',
                                                        'description' => 'A map of attributes associated with the resource',
                                                        'required'   => [],
                                                        'properties' => [
                                                            new OA\Property([
                                                                'property' => 'sourceSet',
                                                                'type'     => 'string',
                                                                'description' => 'If the resource is an image or a video, this is the source set to use for the resource',
                                                            ]),
                                                            new OA\Property([
                                                                'property' => 'sizes',
                                                                'type'     => 'string',
                                                                'description' => 'If the resource is an image or a video, this is the sizes attribute to use for the resource',
                                                            ]),
                                                            new OA\Property([
                                                                'property' => 'altText',
                                                                'type'     => 'string',
                                                                'description' => 'For accessibility and SEO optimization, this is the alt text to use for the resource',
                                                            ]),
                                                            new OA\Property([
                                                                'property' => 'title',
                                                                'type'     => 'string',
                                                                'description' => 'If the resource has a title, this is the title to use for the resource',
                                                            ])
                                                        ]
                                                    ])
                                                ]
                                            ])
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
                        'description' => 'User is not allowed to load the data',
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
                        'description' => 'Unable to load the data',
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