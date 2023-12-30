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

final class PublicMediaUploadEndpoint extends PostEndpoint
{
    public function __construct(
        protected string $url,
    ) {
        parent::__construct(
            $url,
            new RequestParameterCollection(),
            new RequestBody(
                true,
                ContentType::MULTIPART_FORM_DATA,
                ParameterType::OBJECT,
                new ParameterCollection([
                    'file' => new Parameter('file', ParameterType::STRING, ParameterFormat::BINARY, true),
                    'access_key' => new Parameter('access_key', ParameterType::STRING, ParameterFormat::STRING, true),
                ])
            ),
            new ResponseCollection([
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
                    'Forbidden. The user is not allowed to upload files',
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
            ])
        );
    }
}