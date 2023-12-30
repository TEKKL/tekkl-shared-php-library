<?php

namespace Tekkl\Shared\Exception;

use Tekkl\Shared\ContentApp\ContentApp;

class ViewNotFoundException extends \RuntimeException
{
    public function __construct(string $view, ContentApp $contentApp, int $code = 0, \Throwable $previous = null)
    {
        $message = 'The content app "' . $contentApp->getName() . '" does not container the view "' . $view . '".';
        parent::__construct($message, $code, $previous);
    }
}