<?php

namespace Tekkl\Shared\ContentApp;

use Tekkl\Shared\ContentApp\Aggregate\ContentAppBuild\ContentAppBuild;
use Tekkl\Shared\ContentApp\Aggregate\ContentAppBuild\ContentAppBuildCollection;
use Tekkl\Shared\ContentApp\Aggregate\ContentAppView\ContentAppView;
use Tekkl\Shared\ContentApp\Aggregate\ContentAppView\ContentAppViewCollection;
use Tekkl\Shared\Exception\BuildNotFoundException;
use Tekkl\Shared\Exception\ViewNotFoundException;
use Tekkl\Shared\Struct\Struct;

class ContentApp extends Struct
{
    protected string $path;
    protected string $name;
    protected ?string $description = null;
    protected ContentAppViewCollection $views;

    protected ContentAppBuildCollection $builds;

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getViews(): ContentAppViewCollection
    {
        return $this->views;
    }

    public function setViews(ContentAppViewCollection $views): void
    {
        $this->views = $views;
    }

    public function getBuilds(): ContentAppBuildCollection
    {
        return $this->builds;
    }

    public function setBuilds(ContentAppBuildCollection $builds): void
    {
        $this->builds = $builds;
    }

    public function getBuild(string $build): ContentAppBuild
    {
        foreach ($this->builds as $buildItem) {
            if ($buildItem->getName() === $build) {
                return $buildItem;
            }
        }
        throw new BuildNotFoundException($build, $this);
    }

    public function getView(string $view): ContentAppView
    {
        foreach ($this->views as $viewItem) {
            if ($viewItem->getName() === $view) {
                return $viewItem;
            }
        }
        throw new ViewNotFoundException($view, $this);
    }

    public function getViewBuild(string $view): ContentAppBuild
    {
        $view = $this->getView($view);
        return $this->getBuild($view->getBuild());
    }
}