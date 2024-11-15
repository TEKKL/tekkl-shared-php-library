<?php

namespace Tekkl\Shared\Api;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Tekkl\Shared\ContentApp\Config\ContentAppConfig;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

class ApiClient
{
    private Client $client;
    public function __construct(
        private readonly ContentAppConfig $contentAppConfig,
        private readonly string $accessToken
    ) {
        $this->client = new Client();
    }

    public function getContentAppConfig(): ContentAppConfig
    {
        return $this->contentAppConfig;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function publicRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataReadEndpoint()->getUrl(), [
           'form_params' => [
               'key' => $key,
               AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
           ],
        ]));
    }

    public function publicUpsert(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataUpsertionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function publicDelete(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataReadEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateUpsert(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataUpsertionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDeletion(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    private function handleResponse(ResponseInterface $response): array
    {
        $content = json_decode($response->getBody()->getContents(), true);
        if ($response->getStatusCode() !== 200) {
            $message = $content['error'] ?? 'An error occurred while trying to access the API';
            throw new \RuntimeException($message, $response->getStatusCode());
        }
        return $content;
    }
}