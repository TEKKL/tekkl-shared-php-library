<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\ContentType;
use Tekkl\Shared\Api\Parameter\Parameter;
use Tekkl\Shared\Api\Parameter\ParameterCollection;
use Tekkl\Shared\Api\Parameter\ParameterFormat;
use Tekkl\Shared\Api\Parameter\ParameterType;
use Tekkl\Shared\Api\Request\RequestBody;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

final class ResourcesAddEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();

        $this->setBody((new RequestBody())
            ->setRequired(true)
            ->setContentType(ContentType::APPLICATION_JSON)
            ->setType(ParameterType::OBJECT)
            ->setParameters((new ParameterCollection([
                (new Parameter())
                    ->setName('resources')
                    ->setType(ParameterType::ARRAY)
                    ->setFormat(ParameterFormat::OBJECT)
                    ->setRequired(false),
                (new Parameter())
                    ->setName(AccessTokenInterface::PARAM_ACCESS_TOKEN)
                    ->setType(ParameterType::STRING)
                    ->setFormat(ParameterFormat::STRING)
                    ->setRequired(true)
            ])))
        );
    }
}