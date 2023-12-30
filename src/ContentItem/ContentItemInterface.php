<?php

namespace Tekkl\Shared\ContentItem;

use Tekkl\Shared\ContentApp\ContentApp;

interface ContentItemInterface
{
    public function getContentItemId(): string;
    public function getContentApp(): ContentApp;
}