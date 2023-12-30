<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response;

use Tekkl\Shared\Struct\Collection;

class ResponseCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return Response::class;
    }
}