<?php

namespace Tekkl\Shared\Application\Config;

class ApplicationConfigFactory
{
    public static function create(string $pathToConfigFile): ?ApplicationConfig
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
        $config = new ApplicationConfig();
        $config->assign($configArray);
        return $config;
    }
}