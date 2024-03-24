<?php

namespace Tekkl\Shared\Exception;

use Tekkl\Shared\ContentApp\ContentApp;

class BuildNotFoundException extends \RuntimeException
{
    public function __construct(string $build, ContentApp $contentApp, int $code = 0, \Throwable $previous = null)
    {
        $message = 'The content app "' . $contentApp->getName() . '" does not contain the build "' . $build . '".';
        parent::__construct($message, $code, $previous);
    }
}