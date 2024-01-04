<?php

namespace Tekkl\Shared\Api\Response;

use Tekkl\Shared\Struct\Collection;

class ResponseCollection extends Collection
{
    public function add($element): void
    {
        $this->validateType($element);
        $this->set($element->getStatusCode(), $element);
    }
    protected function getExpectedClass(): ?string
    {
        return Response::class;
    }
}