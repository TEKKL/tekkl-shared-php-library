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
    protected string $name;
    protected ?string $description = null;
    protected ContentAppViewCollection $views;
    protected ContentAppBuildCollection $builds;
    protected ?string $path = null;

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): ContentApp
    {
        $this->path = $path;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ContentApp
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): ContentApp
    {
        $this->description = $description;
        return $this;
    }

    public function getViews(): ContentAppViewCollection
    {
        return $this->views;
    }

    public function setViews(ContentAppViewCollection $views): ContentApp
    {
        $this->views = $views;
        return $this;
    }

    public function getBuilds(): ContentAppBuildCollection
    {
        return $this->builds;
    }

    public function setBuilds(ContentAppBuildCollection $builds): ContentApp
    {
        $this->builds = $builds;
        return $this;
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
        if (!$view->getBuild()) {
            throw new \RuntimeException('The view "' . $view->getName() . '" does not define a build.');
        }
        return $this->getBuild($view->getBuild());
    }
}