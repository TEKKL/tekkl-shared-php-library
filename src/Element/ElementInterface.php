<?php

namespace Tekkl\Shared\Element;

use Tekkl\ContentAppServer\ContentApp\Snapshot\ApplicationSnapshot;

interface ElementInterface
{
    public function getElementId(): string;
    public function getApplicationSnapshot(): ApplicationSnapshot;
}