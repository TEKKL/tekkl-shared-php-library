<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppBuildStep;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ContentAppBuildStep>
 */
class ContentAppBuildStepCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ContentAppBuildStep::class;
    }
}