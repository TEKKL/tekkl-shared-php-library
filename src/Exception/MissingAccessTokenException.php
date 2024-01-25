<?php

namespace Tekkl\Shared\Exception;

class MissingAccessTokenException extends \RuntimeException
{
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        $message = 'The access token is missing.';
        parent::__construct($message, $code, $previous);
    }
}