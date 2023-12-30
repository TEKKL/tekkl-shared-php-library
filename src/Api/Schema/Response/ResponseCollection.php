<?php

namespace Tekkl\Shared\Api\Schema\Response;

use Tekkl\Shared\Struct\Collection;

class ResponseCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return Response::class;
    }
}