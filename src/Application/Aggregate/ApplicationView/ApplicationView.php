<?php

namespace Tekkl\Shared\Application\Aggregate\ApplicationView;

use Tekkl\Shared\Struct\Struct;

class ApplicationView extends Struct
{
    protected string $name;
    protected ?string $label = null;
    protected ?string $publicDir = null;
    protected ?string $indexFile = null;
    protected ?string $requestPath = null;

    protected ?string $build = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    public function getBuild(): ?string
    {
        return $this->build;
    }

    public function setBuild(?string $build): void
    {
        $this->build = $build;
    }

    public function getPublicDir(): ?string
    {
        return $this->publicDir;
    }

    public function setPublicDir(?string $publicDir): void
    {
        $this->publicDir = $publicDir;
    }

    public function getRequestPath(): ?string
    {
        return $this->requestPath;
    }

    public function setRequestPath(?string $requestPath): void
    {
        $this->requestPath = $requestPath;
    }

    public function getIndexFile(): ?string
    {
        return $this->indexFile;
    }

    public function setIndexFile(?string $indexFile): ApplicationView
    {
        $this->indexFile = $indexFile;
        return $this;
    }
}