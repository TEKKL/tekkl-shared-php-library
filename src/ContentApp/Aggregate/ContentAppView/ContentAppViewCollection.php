<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppView;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ContentAppView>
 */
class ContentAppViewCollection extends Collection
{
    /**
     * @param ContentAppView $element
     */
    public function add($element): void
    {
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): ?string
    {
        return ContentAppView::class;
    }
}