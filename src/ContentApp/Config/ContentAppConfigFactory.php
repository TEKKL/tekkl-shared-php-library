<?php

namespace Tekkl\Shared\ContentApp\Config;

class ContentAppConfigFactory
{
    public static function create(string $pathToConfigFile): ?ContentAppConfig
    {
        if (!file_exists($pathToConfigFile)) {
            return null;
        }
        $json = file_get_contents($pathToConfigFile);
        if (!$json) {
            return null;
        }
        if (false === $configArray = json_decode($json, true)) {
            return null;
        }
        $config = new ContentAppConfig();
        $config->assign($configArray);
        return $config;
    }
}