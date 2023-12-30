<?php

namespace Tekkl\Shared\Api\Schema\Endpoint;

use Tekkl\Shared\Api\Schema\Request\Method;
use Tekkl\Shared\Api\Schema\Request\MethodCollection;
use Tekkl\Shared\Api\Schema\Response\Response;
use Tekkl\Shared\Api\Schema\Response\ResponseCollection;

final class ApplicationRequestEndpoint extends Endpoint
{
    public function __construct(
        protected string $url
    ) {
        parent::__construct(
            $url,
            new MethodCollection(Method::GET, Method::POST, Method::PUT, Method::DELETE),
            new ResponseCollection([
                200 => new Response(
                    200,
                    'Depending on the request, the response will be different.'
                ),
            ])
        );
    }
}