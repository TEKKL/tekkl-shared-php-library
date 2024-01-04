<?php

namespace Tekkl\Shared\ContentApp\Config;

use Tekkl\Shared\Api\Api;
use Tekkl\Shared\Asset\Stylesheet\CssAssetCollection;
use Tekkl\Shared\Asset\Stylesheet\CssVariableCollection;
use Tekkl\Shared\Asset\Font\FontCollection;
use Tekkl\Shared\Asset\Javascript\JavascriptAssetCollection;
use Tekkl\Shared\Struct\Struct;

class ContentAppConfig extends Struct
{
    public const CONTENT_APP_CONFIG_FILE_NAME = '.content-app-config.json';

    protected array $data = [];
    protected JavascriptAssetCollection $javascriptAssets;
    protected CssAssetCollection $cssAssets;
    protected CssVariableCollection $cssVariables;
    protected FontCollection $fonts;
    protected Api $api;

    public function getJavascriptAssets(): JavascriptAssetCollection
    {
        return $this->javascriptAssets;
    }

    public function setJavascriptAssets(JavascriptAssetCollection $javascriptAssets): void
    {
        $this->javascriptAssets = $javascriptAssets;
    }

    public function getCssAssets(): CssAssetCollection
    {
        return $this->cssAssets;
    }

    public function setCssAssets(CssAssetCollection $cssAssets): void
    {
        $this->cssAssets = $cssAssets;
    }

    public function set(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function has(string $key): bool
    {
        return isset($this->data[$key]);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getFonts(): FontCollection
    {
        return $this->fonts;
    }

    public function setFonts(FontCollection $fonts): void
    {
        $this->fonts = $fonts;
    }

    public function getApi(): Api
    {
        return $this->api;
    }

    public function setApi(Api $api): void
    {
        $this->api = $api;
    }

    public function getCssVariables(): CssVariableCollection
    {
        return $this->cssVariables;
    }

    public function setCssVariables(CssVariableCollection $cssVariables): void
    {
        $this->cssVariables = $cssVariables;
    }
}