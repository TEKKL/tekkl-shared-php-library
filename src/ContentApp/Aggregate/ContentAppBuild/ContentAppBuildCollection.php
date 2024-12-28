<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppBuild;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ContentAppBuild>
 */
class ContentAppBuildCollection extends Collection
{
    /**
     * @param ContentAppBuild $element
     */
    public function add($element): void
    {
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): ?string
    {
        return ContentAppBuild::class;
    }
}