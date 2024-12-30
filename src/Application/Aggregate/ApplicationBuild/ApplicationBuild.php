<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationBuild;

use Tekkl\Shared\Application\Aggregate\ApplicationBuildStep\ApplicationBuildStepCollection;
use Tekkl\Shared\Struct\Struct;

class ApplicationBuild extends Struct
{
    protected string $name;
    protected ApplicationBuildStepCollection $buildSteps;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBuildSteps(): ApplicationBuildStepCollection
    {
        return $this->buildSteps;
    }

    public function setBuildSteps(ApplicationBuildStepCollection $buildSteps): void
    {
        $this->buildSteps = $buildSteps;
    }
}