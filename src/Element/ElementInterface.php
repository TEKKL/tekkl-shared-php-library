<?php

namespace Tekkl\Shared\Element;

use Tekkl\Shared\ContentApp\ContentApp;

interface ElementInterface
{
    public function getElementId(): string;
    public function getContentApp(): ContentApp;
}