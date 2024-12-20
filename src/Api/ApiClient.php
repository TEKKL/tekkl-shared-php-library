<?php

namespace Tekkl\Shared\Api;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;

class ApiClient
{
    private Client $client;
    public function __construct(
        private readonly Api $api,
        private readonly string $accessToken
    ) {
        $this->client = new Client();
    }

    public function getApi(): Api
    {
        return $this->api;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function publicDataRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPublicDataRead()->getUrl()), [
           'form_params' => [
               'key' => $key,
               AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
           ],
        ]));
    }

    public function publicDataWrite(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPublicDataWrite()->getUrl()), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function publicDataDelete(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPublicDataDelete()->getUrl()), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPrivateDataRead()->getUrl()), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataWrite(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPrivateDataWrite()->getUrl()), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataDeletion(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->api->absoluteUrl($this->api->getPrivateDataDelete()->getUrl()), [
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