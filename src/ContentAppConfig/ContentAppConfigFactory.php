<?php

namespace Tekkl\Shared\ContentAppConfig;

class ContentAppConfigFactory
{
    public static function create(string $pathToConfigFile): ?ContentAppConfig
    {
        if (!file_exists($pathToConfigFile) || false === $configArray = json_decode(file_get_contents($pathToConfigFile), true)) {
            return null;
        }
        $config = new ContentAppConfig();
        $config->assign($configArray);
        return $config;
    }
}