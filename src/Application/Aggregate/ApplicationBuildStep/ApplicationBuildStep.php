<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationBuildStep;

use Tekkl\Shared\Struct\Struct;

class ApplicationBuildStep extends Struct
{
    protected string $command;
    protected ?string $directory = null;

    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    public function getDirectory(): ?string
    {
        return $this->directory;
    }

    public function setDirectory(?string $directory): void
    {
        $this->directory = $directory;
    }
}
