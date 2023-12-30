<?php

namespace Tekkl\Shared\ContentAppConfig\Aggregate\Api\Endpoint;

use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\Method;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Request\MethodCollection;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\Response;
use Tekkl\Shared\ContentAppConfig\Aggregate\Api\Response\ResponseCollection;

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