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
    public const CONTENT_APP_CONFIG_DIRECTORY = '.content-app-config';
    public const JAVASCRIPT_ASSETS_FILE = 'javascript-assets.json';
    public const CSS_ASSETS_FILE = 'css-assets.json';
    public const CSS_VARIABLES_FILE = 'css-variables.json';
    public const FONTS_FILE = 'fonts.json';
    public const API_FILE = 'api.json';

    /** @var array<array-key, mixed>  */
    protected array $data = [];
    protected JavascriptAssetCollection $javascriptLibraries;
    protected CssAssetCollection $cssLibraries;

    protected CssVariableCollection $cssVariables;
    protected FontCollection $fonts;
    protected Api $api;

    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    public function get(string $key): mixed
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

    /**
     * @param array<array-key, mixed> $data
     */
    public function setData(array $data): ContentAppConfig
    {
        $this->data = $data;
        return $this;
    }

    public function getJavascriptLibraries(): JavascriptAssetCollection
    {
        return $this->javascriptLibraries;
    }

    public function setJavascriptLibraries(JavascriptAssetCollection $javascriptLibraries): ContentAppConfig
    {
        $this->javascriptLibraries = $javascriptLibraries;
        return $this;
    }

    public function getCssLibraries(): CssAssetCollection
    {
        return $this->cssLibraries;
    }

    public function setCssLibraries(CssAssetCollection $cssLibraries): ContentAppConfig
    {
        $this->cssLibraries = $cssLibraries;
        return $this;
    }

    public function getCssVariables(): CssVariableCollection
    {
        return $this->cssVariables;
    }

    public function setCssVariables(CssVariableCollection $cssVariables): ContentAppConfig
    {
        $this->cssVariables = $cssVariables;
        return $this;
    }

    public function getFonts(): FontCollection
    {
        return $this->fonts;
    }

    public function setFonts(FontCollection $fonts): ContentAppConfig
    {
        $this->fonts = $fonts;
        return $this;
    }

    public function getApi(): Api
    {
        return $this->api;
    }

    public function setApi(Api $api): ContentAppConfig
    {
        $this->api = $api;
        return $this;
    }
}