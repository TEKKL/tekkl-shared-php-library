<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppBuild;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ContentAppBuild>
 */
class ContentAppBuildCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ContentAppBuild::class;
    }
}