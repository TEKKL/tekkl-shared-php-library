<?php

namespace Tekkl\Shared\Api\Endpoint;

final class ResourcesRemoveEndpoint extends PostEndpoint
{
    public function __construct()
    {
        parent::__construct();

        $this->setMethods(new MethodCollection([Method::DELETE]));

        $this->setResponses(new ResponseCollection([(new Response())
            ->setStatusCode(200)
            ->setDescription('The resource was successfully removed.')]));
    }
}