<?php

namespace Tekkl\Shared\Api;

use OpenApi\Annotations\Components;

use OpenApi\Annotations\Schema;
use OpenApi\Annotations\SecurityScheme;
use OpenApi\Annotations\Server;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\OpenApi;
use Symfony\Component\HttpFoundation\Response;
use Tekkl\Shared\Api\Endpoint\ApplicationRequestEndpoint;
use Tekkl\Shared\Api\Endpoint\ResourceListResolveEndpoint;
use Tekkl\Shared\Security\AccessToken\AccessTokenInterface;
use Tekkl\Shared\Struct\Struct;
use Tekkl\Shared\Api\Endpoint\ApplicationRequestEndpointCollection;
use Tekkl\Shared\Api\Endpoint\PublicDataReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDataWriteEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDataDeleteEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDataReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDataWriteEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDataDeleteEndpoint;

final class Api extends Struct
{
    use OpenApiTrait;
    protected string $name;
    protected string $description;
    protected string $version;
    /** @var string[]  */
    protected array $servers;

    protected ApplicationRequestEndpointCollection $applicationRequest;
    protected PublicDataReadEndpoint $publicDataRead;
    protected PublicDataWriteEndpoint $publicDataWrite;
    protected PublicDataDeleteEndpoint $publicDataDelete;
    protected PrivateDataReadEndpoint $privateDataRead;
    protected PrivateDataWriteEndpoint $privateDataWrite;
    protected PrivateDataDeleteEndpoint $privateDataDelete;
    protected ResourceListResolveEndpoint $resourceListResolve;

    public function createOpenApiSchema(): OpenApi
    {
        $openApi = new OpenApi([]);

        $openApi->merge($this->createOpenApiServers());
        $openApi->info = $this->createOpenApiInfo();

        /** @var array<mixed>|string $security */
        $security = $openApi->security;
        $openApi->security = [array_merge(\is_array($security) ? $security : [], $this->createSecurity())];

        if (!$openApi->components instanceof Components) {
            $openApi->components = new Components([]);
        }

        $this->enrichComponents($openApi->components);
        $openApi->merge($this->createOpenApiPaths());

        return $openApi;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Api
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Api
    {
        $this->description = $description;
        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): Api
    {
        $this->version = $version;
        return $this;
    }

    public function getApplicationRequest(): ApplicationRequestEndpointCollection
    {
        return $this->applicationRequest;
    }

    public function setApplicationRequest(ApplicationRequestEndpointCollection $applicationRequest): Api
    {
        $this->applicationRequest = $applicationRequest;
        return $this;
    }

    public function getPublicDataRead(): PublicDataReadEndpoint
    {
        return $this->publicDataRead;
    }

    public function setPublicDataRead(PublicDataReadEndpoint $publicDataRead): Api
    {
        $this->publicDataRead = $publicDataRead;
        return $this;
    }

    public function getPublicDataWrite(): PublicDataWriteEndpoint
    {
        return $this->publicDataWrite;
    }

    public function setPublicDataWrite(PublicDataWriteEndpoint $publicDataWrite): Api
    {
        $this->publicDataWrite = $publicDataWrite;
        return $this;
    }

    public function getPublicDataDelete(): PublicDataDeleteEndpoint
    {
        return $this->publicDataDelete;
    }

    public function setPublicDataDelete(PublicDataDeleteEndpoint $publicDataDelete): Api
    {
        $this->publicDataDelete = $publicDataDelete;
        return $this;
    }

    public function getPrivateDataRead(): PrivateDataReadEndpoint
    {
        return $this->privateDataRead;
    }

    public function setPrivateDataRead(PrivateDataReadEndpoint $privateDataRead): Api
    {
        $this->privateDataRead = $privateDataRead;
        return $this;
    }

    public function getPrivateDataWrite(): PrivateDataWriteEndpoint
    {
        return $this->privateDataWrite;
    }

    public function setPrivateDataWrite(PrivateDataWriteEndpoint $privateDataWrite): Api
    {
        $this->privateDataWrite = $privateDataWrite;
        return $this;
    }

    public function getPrivateDataDelete(): PrivateDataDeleteEndpoint
    {
        return $this->privateDataDelete;
    }

    public function setPrivateDataDelete(PrivateDataDeleteEndpoint $privateDataDelete): Api
    {
        $this->privateDataDelete = $privateDataDelete;
        return $this;
    }

    public function getResourceListResolve(): ResourceListResolveEndpoint
    {
        return $this->resourceListResolve;
    }

    public function setResourceListResolve(ResourceListResolveEndpoint $resourceListResolve): Api
    {
        $this->resourceListResolve = $resourceListResolve;
        return $this;
    }

    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * @param string[] $servers
     */
    public function setServers(array $servers): Api
    {
        $this->servers = $servers;
        return $this;
    }

    private function enrichComponents(Components $components): void
    {
        $components->merge($this->getDefaultSchemas());
        $components->merge($this->createSecurityScheme());
        $components->merge($this->createDefaultResponses());
    }

    private function createSecurityScheme(): array
    {
        return [
            'JWT' => new SecurityScheme([
                'securityScheme' => 'JWT',
                'type' => 'apiKey',
                'in' => 'query',
                'name' => AccessTokenInterface::PARAM_ACCESS_TOKEN,
                'description' => 'Identifies the element and the authorization level of the user.',
            ])
        ];
    }

    private function createOpenApiServers(): array
    {
        $servers = [];
        foreach ($this->getServers() as $server) {
            $servers[] = new Server(['url' => $server]);
        }

        return $servers;
    }

    private function createOpenApiInfo(): Info
    {
        return new Info(
            [
                'title' => $this->getName(),
                'description' => $this->getDescription(),
                'version' => $this->getVersion()
            ]
        );
    }

    private function createSecurity(): array
    {
        return ['ApiKey' => []];
    }

    private function getDefaultSchemas(): array
    {
        return [
            'success' => new Schema([
                'schema' => 'success',
                'type' => 'object',
                'required' => ['data'],
                'additionalProperties' => false,
                'properties' => [
                    'meta' => ['$ref' => '#/components/schemas/meta'],
                    'data' => ['$ref' => '#/components/schemas/data'],
                ],
            ]),
            'failure' => new Schema([
                'schema' => 'failure',
                'type' => 'object',
                'required' => ['errors'],
                'additionalProperties' => false,
                'properties' => [
                    'meta' => ['$ref' => '#/components/schemas/meta'],
                    'errors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/components/schemas/error'],
                        'uniqueItems' => true,
                    ],
                ],
            ]),
            'meta' => new Schema([
                'schema' => 'meta',
                'description' => 'Non-standard meta-information that can not be represented as an attribute or relationship.',
                'type' => 'object',
                'additionalProperties' => true,
            ]),
            'data' => new Schema([
                'schema' => 'data',
                'description' => 'The document\'s "primary data" is a representation of the resource or collection of resources targeted by a request.',
                'type' => 'object',
            ]),
            'pagination' => new Schema([
                'schema' => 'pagination',
                'type' => 'object',
                'properties' => [
                    'first' => [
                        'description' => 'The first page of data',
                        'type' => 'string',
                        'format' => 'uri-reference',
                    ],
                    'last' => [
                        'description' => 'The last page of data',
                        'type' => 'string',
                        'format' => 'uri-reference',
                    ],
                    'prev' => [
                        'description' => 'The previous page of data',
                        'type' => 'string',
                        'format' => 'uri-reference',
                    ],
                    'next' => [
                        'description' => 'The next page of data',
                        'type' => 'string',
                        'format' => 'uri-reference',
                    ],
                ],
            ]),
            'error' => new Schema([
                'schema' => 'error',
                'type' => 'object',
                'properties' => [
                    'id' => ['type' => 'string', 'description' => 'A unique identifier for this particular occurrence of the problem.'],
                    'status' => ['type' => 'string', 'description' => 'The HTTP status code applicable to this problem, expressed as a string value.'],
                    'code' => ['type' => 'string', 'description' => 'An application-specific error code, expressed as a string value.'],
                    'title' => ['type' => 'string', 'description' => 'A short, human-readable summary of the problem. It **SHOULD NOT** change from occurrence to occurrence of the problem, except for purposes of localization.'],
                    'detail' => ['type' => 'string', 'description' => 'A human-readable explanation specific to this occurrence of the problem.'],
                    'description' => ['type' => 'string', 'description' => 'A human-readable description of the problem.'],
                    'source' => [
                        'type' => 'object',
                        'properties' => [
                            'pointer' => ['type' => 'string', 'description' => 'A JSON Pointer [RFC6901] to the associated entity in the request document [e.g. "/data" for a primary data object, or "/data/attributes/title" for a specific attribute].'],
                            'parameter' => ['type' => 'string', 'description' => 'A string indicating which query parameter caused the error.'],
                        ],
                    ],
                    'meta' => ['$ref' => '#/components/schemas/meta'],
                ],
                'additionalProperties' => false,
            ]),
        ];
    }

    private function createDefaultResponses(): array
    {
        return [
            Response::HTTP_NOT_FOUND => $this->createErrorResponse(Response::HTTP_NOT_FOUND, 'Not Found', 'Resource with given parameter was not found.'),
            Response::HTTP_FORBIDDEN => $this->createErrorResponse(Response::HTTP_FORBIDDEN, 'Forbidden', 'This operation is restricted to logged in users.'),
            Response::HTTP_UNAUTHORIZED => $this->createErrorResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized', 'Authorization information is missing or invalid.'),
            Response::HTTP_BAD_REQUEST => $this->createErrorResponse(Response::HTTP_BAD_REQUEST, 'Bad Request', 'Bad parameters for this endpoint. See documentation for the correct ones.'),
        ];
    }

    private function createOpenApiPaths(): array
    {
        $paths = [
            'public-data-read' => $this->getPublicDataRead()->createOpenApiSchema(),
            'public-data-write' => $this->getPublicDataWrite()->createOpenApiSchema(),
            'public-data-delete' => $this->getPublicDataDelete()->createOpenApiSchema(),
            'private-data-read' => $this->getPrivateDataRead()->createOpenApiSchema(),
            'private-data-write' => $this->getPrivateDataWrite()->createOpenApiSchema(),
            'private-data-delete' => $this->getPrivateDataDelete()->createOpenApiSchema(),
            'resource-list-resolve' => $this->getResourceListResolve()->createOpenApiSchema(),
        ];
        /** @var ApplicationRequestEndpoint $endpoint */
        foreach ($this->getApplicationRequest() as $endpoint) {
            $paths['application-request-' . $endpoint->getView()] = $endpoint->createOpenApiSchema();
        }
        return $paths;
    }
}