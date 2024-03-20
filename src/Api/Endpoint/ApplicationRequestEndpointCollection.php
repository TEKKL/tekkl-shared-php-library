<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ApplicationRequestEndpoint>
 */
class ApplicationRequestEndpointCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ApplicationRequestEndpoint::class;
    }
}