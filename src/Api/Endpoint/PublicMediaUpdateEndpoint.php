<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\ContentType;
use Tekkl\Shared\Api\Parameter\Parameter;
use Tekkl\Shared\Api\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Parameter\ParameterFormat;
use Tekkl\Shared\Api\Parameter\ParameterType;
use Tekkl\Shared\Api\Request\RequestBody;
use Tekkl\Shared\Api\Request\RequestParameterCollection;
use Tekkl\Shared\Api\Response\Response;
use Tekkl\Shared\Api\Response\ResponseCollection;
use Tekkl\Shared\Api\Response\ResponseContent;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class PublicMediaUpdateEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();
        $this->setParameters(new RequestParameterCollection());
        $this->setBody((new RequestBody())
            ->setRequired(true)
            ->setContentType(ContentType::APPLICATION_JSON)
            ->setType(ParameterType::OBJECT)
            ->setParameters((new ParameterCollection([
                (new Parameter())
                    ->setName('media_id')
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true),
                (new Parameter())
                    ->setName('filename')
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true),
                (new Parameter())
                    ->setName('mime_type')
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true),
                (new Parameter())
                    ->setName('data')
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::BINARY)
                    ->setRequired(true),
                (new Parameter())
                    ->setName(AccessTokenInterface::PARAM_ACCESS_TOKEN)
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true)
            ])))
        );
        $this->setResponses(new ResponseCollection([
            (new Response())
                ->setStatusCode(200)
                ->setDescription('Successfully uploaded the file')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('media')
                            ->setType(ParameterType::OBJECT)
                            ->setFormat(ParameterFormat::OBJECT)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(400)
                ->setDescription('Bad request. Missing or invalid parameters.')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(403)
                ->setDescription('Forbidden. The user is not allowed to upload/update files')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(404)
                ->setDescription('Media to update not found')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(413)
                ->setDescription('The file is too large')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(415)
                ->setDescription('The file type is not supported')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(500)
                ->setDescription('Unable to upload the file')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ])))),
            (new Response())
                ->setStatusCode(507)
                ->setDescription('Insufficient storage space')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true),
                        (new Parameter())
                            ->setName('error')
                            ->setType(ParameterType::STRING)
                            ->setFormat(ParameterFormat::STRING)
                            ->setRequired(true),
                    ]))))
        ]));
    }
}