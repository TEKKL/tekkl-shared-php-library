<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppBuildStep;

use Tekkl\Shared\Struct\Collection;

class ContentAppBuildStepCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ContentAppBuildStep::class;
    }
}