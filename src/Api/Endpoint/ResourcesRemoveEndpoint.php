<?php

namespace Tekkl\Shared\Api\Endpoint;

use OpenApi\Annotations as OA;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class ResourcesRemoveEndpoint extends PostEndpoint
{
    public function createOpenApiSchema(): OA\PathItem
    {
        $options = [
            'path' => $this->url,
            'post' => new OA\Post([
                'tags' => ['resource-remove'],
                'summary'     => 'Removes a resource association from an element',
                'description' => 'This endpoint allows you to remove an existing resource association from an element.',
                'requestBody' => new OA\RequestBody([
                    'required' => true,
                    'content'  => [
                        'application/json' => new OA\MediaType([
                            'schema' => new OA\Schema([
                                'type'       => 'object',
                                'required'   => [AccessTokenInterface::PARAM_ACCESS_TOKEN, 'resourceId', 'resourceType'],
                                'properties' => [
                                    new OA\Property([
                                        'property' => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                                        'type'     => 'string',
                                        'format'   => 'string',
                                        'description' => 'Access token for authentication.',
                                    ]),
                                    new OA\Property([
                                        'property' => 'resourceId',
                                        'type'     => 'string',
                                        'format'   => 'string',
                                        'description' => 'The ID of the resource you want to associate with the element.',
                                    ]),
                                    new OA\Property([
                                        'property' => 'resourceType',
                                        'type'    => 'string',
                                        'enum'    => ['element', 'media'],
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
                        'response'    => 404,
                        'description' => 'The resource association does not exist with the element',
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