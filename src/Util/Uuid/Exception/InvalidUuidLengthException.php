<?php declare(strict_types=1);

namespace Tekkl\Shared\Util\Uuid\Exception;

class InvalidUuidLengthException extends \RuntimeException
{
    public function __construct(int $length, string $hex)
    {
        parent::__construct(
            'UUID has a invalid length. 16 bytes expected, ' . $length . ' given. Hexadecimal reprensentation: ' . $hex);
    }
}
