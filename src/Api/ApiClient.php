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

    public function publicDataRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataReadEndpoint()->getUrl(), [
           'form_params' => [
               'key' => $key,
               AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
           ],
        ]));
    }

    public function publicDataUpsert(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataUpsertionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function publicDataDeletion(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicDataDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataRead(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataReadEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataUpsert(?string $key, mixed $value): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataUpsertionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                'value' => $value,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateDataDeletion(?string $key = null): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateDataDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'key' => $key,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function publicMediaUpload(string $filename, string $mimeType, string $data): array
    {
        // Create a stream from the binary data
        $stream = fopen('data://text/plain;base64,' . base64_encode($data), 'r');
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicMediaUploadEndpoint()->getUrl(), [
            'multipart' => [
                [
                    'name'     => 'filename',
                    'contents' => $filename
                ],
                [
                    'name'     => 'mime_type',
                    'contents' => $mimeType
                ],
                [
                    'name'     => 'data',
                    'contents' => $stream
                ],
                [
                    'name'     => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                    'contents' => $this->accessToken,
                ],
            ]
        ]));
    }

    public function publicMediaUpdate(string $mediaId, string $filename, string $mimeType, string $data): array
    {
        // Create a stream from the binary data
        $stream = fopen('data://text/plain;base64,' . base64_encode($data), 'r');
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicMediaUpdateEndpoint()->getUrl(), [
            'multipart' => [
                [
                    'name'     => 'media_id',
                    'contents' => $mediaId
                ],
                [
                    'name'     => 'filename',
                    'contents' => $filename
                ],
                [
                    'name'     => 'mime_type',
                    'contents' => $mimeType
                ],
                [
                    'name'     => 'data',
                    'contents' => $stream
                ],
                [
                    'name'     => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                    'contents' => $this->accessToken,
                ],
            ]
        ]));
    }

    public function publicMediaList(): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicMediaListEndpoint()->getUrl(), [
            'form_params' => [
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function publicMediaDelete(string $mediaId): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPublicMediaDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'media_id' => $mediaId,
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateMediaUpload(string $filename, string $mimeType, string $data): array
    {
        // Create a stream from the binary data
        $stream = fopen('data://text/plain;base64,' . base64_encode($data), 'r');
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateMediaUploadEndpoint()->getUrl(), [
            'multipart' => [
                [
                    'name'     => 'filename',
                    'contents' => $filename
                ],
                [
                    'name'     => 'mime_type',
                    'contents' => $mimeType
                ],
                [
                    'name'     => 'data',
                    'contents' => $stream
                ],
                [
                    'name'     => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                    'contents' => $this->accessToken,
                ],
            ]
        ]));
    }

    public function privateMediaUpdate(string $mediaId, string $filename, string $mimeType, string $data): array
    {
        // Create a stream from the binary data
        $stream = fopen('data://text/plain;base64,' . base64_encode($data), 'r');
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateMediaUpdateEndpoint()->getUrl(), [
            'multipart' => [
                [
                    'name'     => 'media_id',
                    'contents' => $mediaId
                ],
                [
                    'name'     => 'filename',
                    'contents' => $filename
                ],
                [
                    'name'     => 'mime_type',
                    'contents' => $mimeType
                ],
                [
                    'name'     => 'data',
                    'contents' => $stream
                ],
                [
                    'name'     => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                    'contents' => $this->accessToken,
                ],
            ]
        ]));
    }

    public function privateMediaList(): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateMediaListEndpoint()->getUrl(), [
            'form_params' => [
                AccessTokenInterface::PARAM_ACCESS_TOKEN => $this->accessToken,
            ],
        ]));
    }

    public function privateMediaDelete(string $mediaId): array
    {
        return $this->handleResponse($this->client->post($this->contentAppConfig->getApi()->getPrivateMediaDeletionEndpoint()->getUrl(), [
            'form_params' => [
                'media_id' => $mediaId,
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