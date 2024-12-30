<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationBuild;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ApplicationBuild>
 */
class ApplicationBuildCollection extends Collection
{
    /**
     * @param ApplicationBuild $element
     */
    public function add($element): void
    {
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): ?string
    {
        return ApplicationBuild::class;
    }
}