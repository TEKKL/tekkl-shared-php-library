<?php

namespace Tekkl\Shared\Exception;

use Tekkl\Shared\Application\Application;

class ViewNotFoundException extends \RuntimeException
{
    public function __construct(string $view, Application $application, int $code = 0, \Throwable $previous = null)
    {
        $message = 'The content app "' . $application->getName() . '" does not container the view "' . $view . '".';
        parent::__construct($message, $code, $previous);
    }
}