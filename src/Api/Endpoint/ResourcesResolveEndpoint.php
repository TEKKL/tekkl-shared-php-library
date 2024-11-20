<?php

namespace Tekkl\Workspace\Api\Route\Resource;

final class ResourcesResolveEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();

        $this->setMethods(new MethodCollection([Method::POST]));

        $this->setResponses(new ResponseCollection([(new Response())
            ->setStatusCode(200)
            ->setDescription('The resource was successfully resolved.')]));
    }
}