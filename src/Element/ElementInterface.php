<?php

namespace Tekkl\Shared\Element;

use Tekkl\ApplicationServer\Application\Snapshot\ApplicationSnapshot;

interface ElementInterface
{
    public function getElementId(): string;
    public function getApplicationSnapshot(): ApplicationSnapshot;
}