<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationBuildStep;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ApplicationBuildStep>
 */
class ApplicationBuildStepCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ApplicationBuildStep::class;
    }
}