<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\ContentType;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\Parameter;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterFormat;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Parameter\ParameterType;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestBody;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\RequestParameterCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\Response;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseContent;

final class PublicDataUpsertionEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();
        $this->setParameters(new RequestParameterCollection());
        $this->setBody(new RequestBody(
            true,
            ContentType::APPLICATION_JSON,
            ParameterType::OBJECT,
            new ParameterCollection([
                'key' => new Parameter('key', ParameterType::STRING, ParameterFormat::STRING, false),
                'value' => new Parameter('value', ParameterType::MIXED, ParameterFormat::MIXED, true),
                'access_key' => new Parameter('access_key', ParameterType::STRING, ParameterFormat::STRING, true),
            ])
        ));
        $this->setResponses(new ResponseCollection([
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
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
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
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
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
        ]));
    }
}