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

final class PublicMediaListEndpoint extends PostEndpoint
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
                    'page' => new Parameter('page', ParameterType::INTEGER, ParameterFormat::INT32, false, 'the page to load', 1),
                    'limit' => new Parameter('limit', ParameterType::INTEGER, ParameterFormat::INT32, false, 'the number of items per page', 10),
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
                            'data' => new Parameter('key', ParameterType::ARRAY, ParameterFormat::OBJECT, true, 'a collection of media items'),
                            'page' => new Parameter('value', ParameterType::INTEGER, ParameterFormat::INT32, true),
                            'limit' => new Parameter('value', ParameterType::INTEGER, ParameterFormat::INT32, true),
                            'total' => new Parameter('value', ParameterType::MIXED, ParameterFormat::MIXED, true),
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
                    'User is not allowed to access media list',
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