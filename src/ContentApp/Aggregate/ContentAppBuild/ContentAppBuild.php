<?php

namespace Tekkl\Shared\ContentApp\Aggregate\ContentAppBuild;

use Tekkl\Shared\ContentApp\Aggregate\ContentAppBuildStep\ContentAppBuildStepCollection;
use Tekkl\Shared\Struct\Struct;

class ContentAppBuild extends Struct
{
    protected string $name;
    protected ContentAppBuildStepCollection $buildSteps;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBuildSteps(): ContentAppBuildStepCollection
    {
        return $this->buildSteps;
    }

    public function setBuildSteps(ContentAppBuildStepCollection $buildSteps): void
    {
        $this->buildSteps = $buildSteps;
    }
}