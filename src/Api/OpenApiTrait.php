<?php

namespace Tekkl\Shared\Api;

use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

trait OpenApiTrait
{
    private function createErrorResponse(int $statusCode, string $title, string $description): Response
    {
        $schema = new Schema([
            'ref' => '#/components/schemas/failure',
        ]);

        $example = [
            'errors' => [
                [
                    'status' => (string) $statusCode,
                    'title' => $title,
                    'description' => $description,
                ],
            ],
        ];

        return new Response([
            'response' => $statusCode,
            'description' => $title,
            'content' => [
                new MediaType([
                    'mediaType' => 'application/json',
                    'schema' => $schema,
                    'example' => $example,
                ]),
            ],
        ]);
    }
}