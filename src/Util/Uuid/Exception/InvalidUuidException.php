<?php declare(strict_types=1);

namespace Tekkl\Shared\Util\Uuid\Exception;

class InvalidUuidException extends \RuntimeException
{
    public function __construct(string $uuid)
    {
        parent::__construct('Value is not a valid UUID: ' . $uuid);
    }
}
