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

final class PrivateMediaUpdateEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();
        $this->setParameters(new RequestParameterCollection());
        $this->setBody(new RequestBody(
            true,
            ContentType::MULTIPART_FORM_DATA,
            ParameterType::OBJECT,
            new ParameterCollection([
                'media_id' => new Parameter('media_id', ParameterType::STRING, ParameterFormat::STRING, true),
                'file' => new Parameter('file', ParameterType::STRING, ParameterFormat::BINARY, true),
                'access_key' => new Parameter('access_key', ParameterType::STRING, ParameterFormat::STRING, true),
            ])
        ));
        $this->setResponses(new ResponseCollection([
            200 => new Response(
                200,
                'Successfully uploaded the file',
                new ResponseContent(
                    ContentType::APPLICATION_JSON,
                    ParameterType::OBJECT,
                    new ParameterCollection([
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        'media' => new Parameter('media', ParameterType::OBJECT, ParameterFormat::OBJECT, true),
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
                'Forbidden. The user is not allowed to upload/update files',
                new ResponseContent(
                    ContentType::APPLICATION_JSON,
                    ParameterType::OBJECT,
                    new ParameterCollection([
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                    ])
                )
            ),
            404 => new Response(
                404,
                'Media to update not found',
                new ResponseContent(
                    ContentType::APPLICATION_JSON,
                    ParameterType::OBJECT,
                    new ParameterCollection([
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                    ])
                )
            ),
            413 => new Response(
                413,
                'The file is too large',
                new ResponseContent(
                    ContentType::APPLICATION_JSON,
                    ParameterType::OBJECT,
                    new ParameterCollection([
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                    ])
                )
            ),
            415 => new Response(
                415,
                'The file type is not supported',
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
                'Unable to upload the file',
                new ResponseContent(
                    ContentType::APPLICATION_JSON,
                    ParameterType::OBJECT,
                    new ParameterCollection([
                        'success' => new Parameter('success', ParameterType::BOOLEAN, ParameterFormat::BOOLEAN, true),
                        'error' => new Parameter('error', ParameterType::STRING, ParameterFormat::STRING, true),
                    ])
                )
            ),
            507 => new Response(
                507,
                'Insufficient storage space',
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