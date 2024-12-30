<?php

namespace Tekkl\Shared\Application;

use Tekkl\Shared\Application\Aggregate\ApplicationBuild\ApplicationBuild;
use Tekkl\Shared\Application\Aggregate\ApplicationBuild\ApplicationBuildCollection;
use Tekkl\Shared\Application\Aggregate\ApplicationView\ApplicationView;
use Tekkl\Shared\Application\Aggregate\ApplicationView\ApplicationViewCollection;
use Tekkl\Shared\Exception\BuildNotFoundException;
use Tekkl\Shared\Exception\ViewNotFoundException;
use Tekkl\Shared\Struct\Struct;

class Application extends Struct
{
    protected string $name;
    protected ?string $description = null;
    protected ApplicationViewCollection $views;
    protected ApplicationBuildCollection $builds;
    protected ?string $path = null;

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): Application
    {
        $this->path = $path;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Application
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Application
    {
        $this->description = $description;
        return $this;
    }

    public function getViews(): ApplicationViewCollection
    {
        return $this->views;
    }

    public function setViews(ApplicationViewCollection $views): Application
    {
        $this->views = $views;
        return $this;
    }

    public function getBuilds(): ApplicationBuildCollection
    {
        return $this->builds;
    }

    public function setBuilds(ApplicationBuildCollection $builds): Application
    {
        $this->builds = $builds;
        return $this;
    }

    public function getBuild(string $build): ApplicationBuild
    {
        foreach ($this->builds as $buildItem) {
            if ($buildItem->getName() === $build) {
                return $buildItem;
            }
        }
        throw new BuildNotFoundException($build, $this);
    }

    public function getView(string $view): ApplicationView
    {
        foreach ($this->views as $viewItem) {
            if ($viewItem->getName() === $view) {
                return $viewItem;
            }
        }
        throw new ViewNotFoundException($view, $this);
    }

    public function getViewBuild(string $view): ApplicationBuild
    {
        $view = $this->getView($view);
        if (!$view->getBuild()) {
            throw new \RuntimeException('The view "' . $view->getName() . '" does not define a build.');
        }
        return $this->getBuild($view->getBuild());
    }
}