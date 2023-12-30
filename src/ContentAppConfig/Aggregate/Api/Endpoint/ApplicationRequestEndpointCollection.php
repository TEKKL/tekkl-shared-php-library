<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\Struct\Collection;

class ApplicationRequestEndpointCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ApplicationRequestEndpoint::class;
    }
}