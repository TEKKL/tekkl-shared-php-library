<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationView;

use Tekkl\Shared\Struct\Collection;

/**
 * @extends Collection<ApplicationView>
 */
class ApplicationViewCollection extends Collection
{
    /**
     * @param ApplicationView $element
     */
    public function add($element): void
    {
        parent::set($element->getName(), $element);
    }

    protected function getExpectedClass(): ?string
    {
        return ApplicationView::class;
    }
}