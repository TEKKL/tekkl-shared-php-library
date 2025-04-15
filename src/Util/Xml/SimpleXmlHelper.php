<?php

namespace Tekkl\Shared\Util\Xml;

use SimpleXMLElement;

class SimpleXmlHelper
{
    public static function toString(SimpleXMLElement $xml): string
    {
        return (string) $xml;
    }

    public static function toInt(SimpleXMLElement $xml): int
    {
        return (int) $xml;
    }

    public static function toBool(SimpleXMLElement $xml): bool
    {
        $value = (string) $xml;
        return $value === 'true' || $value === '1' || $value === 'yes' || $value === 'on';
    }
}