<?php

namespace Tekkl\Shared\Application\Snapshot\Config;

class ApplicationSnapshotConfigFactory
{
    public static function create(string $pathToConfigFile): ?ApplicationSnapshotConfig
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
        $config = new ApplicationSnapshotConfig();
        $config->assign($configArray);
        return $config;
    }
}