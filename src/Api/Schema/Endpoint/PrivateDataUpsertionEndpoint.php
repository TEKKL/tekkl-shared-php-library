<?php

namespace Tekkl\Shared\Api\Schema\Endpoint;

use Tekkl\Shared\Api\Schema\ContentType;
use Tekkl\Shared\Api\Schema\Parameter\Parameter;
use Tekkl\Shared\Api\Schema\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Schema\Parameter\ParameterFormat;
use Tekkl\Shared\Api\Schema\Parameter\ParameterType;
use Tekkl\Shared\Api\Schema\Request\RequestBody;
use Tekkl\Shared\Api\Schema\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Schema\Response\Response;
use Tekkl\Shared\Api\Schema\Response\ResponseCollection;
use Tekkl\Shared\Api\Schema\Response\ResponseContent;

final class PrivateDataUpsertionEndpoint extends PostEndpoint
{
    public function __construct(
        protected string $url,
    ) {
        parent::__construct(
            $url,
            new RequestParameterCollection(),
            new RequestBody(
                true,
                ContentType::APPLICATION_JSON,
                ParameterType::OBJECT,
                new ParameterCollection([
                    'key' => new Parameter('key', ParameterType::STRING, ParameterFormat::STRING, false),
                    'value' => new Parameter('value', ParameterType::MIXED, ParameterFormat::MIXED, true),
                    'access_key' => new Parameter('access_key', ParameterType::STRING, ParameterFormat::STRING, true),
                ])
            ),
            new ResponseCollection([
                200 => new Response(
                    200,
                    'OK',
                    new ResponseContent(
                        ContentType::APPLICATION_JSON,
                        ParameterType::OBJECT,
                        new ParameterCollection([
                            'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        ])
                    )
                ),
                400 => new Response(
                    400,
                    'Bad request. Missing or invalid parameters.',
                    new ResponseContent(
                        ContentType::APPLICATION_JSON,
                        ParameterType::OBJECT,
                        new ParameterCollection([
                            'key' => new Parameter('key', ParameterType::STRING, ParameterFormat::STRING, true),
                            'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                        ])
                    )
                ),
                403 => new Response(
                    403,
                    'User is not allowed to update the data',
                    new ResponseContent(
                        ContentType::APPLICATION_JSON,
                        ParameterType::OBJECT,
                        new ParameterCollection([
                            'key' => new Parameter('key', ParameterType::STRING, ParameterFormat::STRING, true),
                            'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                        ])
                    )
                ),
                500 => new Response(
                    500,
                    'Unable to save the data',
                    new ResponseContent(
                        ContentType::APPLICATION_JSON,
                        ParameterType::OBJECT,
                        new ParameterCollection([
                            'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                            'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                        ])
                    )
                ),
            ])
        );
    }
}