<?php

namespace Tekkl\Shared\Exception;

use Tekkl\Shared\Application\Application;

class BuildNotFoundException extends \RuntimeException
{
    public function __construct(string $build, Application $application, int $code = 0, \Throwable $previous = null)
    {
        $message = 'The content app "' . $application->getName() . '" does not contain the build "' . $build . '".';
        parent::__construct($message, $code, $previous);
    }
}