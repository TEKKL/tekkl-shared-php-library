<?php

namespace Tekkl\Shared\Api\Endpoint;

use OpenApi\Annotations as OA;
use Tekkl\Shared\Api\Request\Method;
use Tekkl\Shared\Api\Request\MethodCollection;
use RuntimeException;

final class ApplicationRequestEndpoint extends Endpoint
{
    protected string $view;

    /**
     * @param array<array-key, mixed> $options
     */
    public static function create(string $url, array $options = []): static
    {
        $endpoint = new static();
        $endpoint->setUrl($url);
        if (!isset($options['view'])) {
            throw new RuntimeException('View is required for ApplicationRequestEndpoint');
        }
        $endpoint->setView($options['view']);
        $endpoint->setMethods(new MethodCollection($options['methods'] ?? [
            Method::GET,
            Method::POST,
            Method::PUT,
            Method::DELETE
        ]));
        return $endpoint;
    }

    public function createOpenApiSchema(): OA\PathItem
    {
        return new OA\PathItem([
            'path' => $this->url,
            'summary' => $this->view,
            'description' => 'The application request endpoint for the ' . $this->view . ' view of this content app. Requests must be authenticated by an element access token. Responses depend on the applications logic.',
            'get' => new OA\Get([
                'tags' => [
                    'application-request-get',
                    'application-request-get-' . $this->view
                ],
                'summary'     => 'The application request GET endpoint',
                'responses' => [
                    new OA\Response([
                        'response'    => 200,
                        'description' => 'OK'
                    ]),
                ],
            ]),
            'post' => new OA\Post([
                'tags' => [
                    'application-request-post',
                    'application-request-post-' . $this->view
                ],
                'summary'     => 'The application request POST endpoint',
                'responses' => [
                    new OA\Response([
                        'response'    => 200,
                        'description' => 'OK'
                    ]),
                ],
            ]),
            'put' => new OA\Put([
                'tags' => [
                    'application-request-put',
                    'application-request-put-' . $this->view
                ],
                'summary'     => 'The application request PUT endpoint',
                'responses' => [
                    new OA\Response([
                        'response'    => 200,
                        'description' => 'OK'
                    ]),
                ],
            ]),
            'delete' => new OA\Delete([
                'tags' => [
                    'application-request-delete',
                    'application-request-delete-' . $this->view
                ],
                'summary'     => 'The application request DELETE endpoint',
                'responses' => [
                    new OA\Response([
                        'response'    => 200,
                        'description' => 'OK'
                    ]),
                ],
            ])
        ]);
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function setView(string $view): ApplicationRequestEndpoint
    {
        $this->view = $view;
        return $this;
    }
}