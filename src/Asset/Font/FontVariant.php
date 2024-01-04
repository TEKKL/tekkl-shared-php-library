<?php

namespace Tekkl\Shared\Asset\Font;

use Tekkl\Shared\Struct\Struct;

class FontVariant extends Struct
{
    protected string $name;
    protected FontSourceCollection $sources;
    protected ?string $weight = null;
    protected ?string $style = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): FontVariant
    {
        $this->name = $name;
        return $this;
    }

    public function getSources(): FontSourceCollection
    {
        return $this->sources;
    }

    public function setSources(FontSourceCollection $sources): FontVariant
    {
        $this->sources = $sources;
        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): FontVariant
    {
        $this->weight = $weight;
        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): FontVariant
    {
        $this->style = $style;
        return $this;
    }
}