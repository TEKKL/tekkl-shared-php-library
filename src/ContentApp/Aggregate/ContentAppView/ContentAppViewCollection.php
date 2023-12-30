<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppView;

use Tekkl\Shared\Struct\Collection;

class ContentAppViewCollection extends Collection
{
    protected function getExpectedClass(): ?string
    {
        return ContentAppView::class;
    }
}