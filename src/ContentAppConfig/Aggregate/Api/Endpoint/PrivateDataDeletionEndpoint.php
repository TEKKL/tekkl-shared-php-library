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
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class PrivateDataDeletionEndpoint extends PostEndpoint
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
                    ->setName('key')
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(false),
                (new Parameter())
                    ->setName(AccessTokenInterface::PARAM_ACCESS_TOKEN)
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true)
            ]))));

        $this->setResponses((new ResponseCollection([
            (new Response())
                ->setStatusCode(200)
                ->setDescription('OK')
                ->setContent((new ResponseContent())
                    ->setContentType(ContentType::APPLICATION_JSON)
                    ->setType(ParameterType::OBJECT)
                    ->setProperties((new ParameterCollection([
                        (new Parameter())
                            ->setName('success')
                            ->setType(ParameterType::BOOLEAN)
                            ->setFormat(ParameterFormat::BOOLEAN)
                            ->setRequired(true)
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
                            ->setRequired(true)
                    ])))),
            (new Response())
                ->setStatusCode(403)
                ->setDescription('User is not allowed to delete the data')
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
                            ->setRequired(true)
                    ])))),
            (new Response())
                ->setStatusCode(500)
                ->setDescription('Unable to delete the data')
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
                            ->setRequired(true)
                    ]))))
        ])));
    }
}