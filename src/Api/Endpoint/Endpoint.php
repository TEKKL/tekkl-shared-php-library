<?php

namespace Tekkl\Shared\Api\Endpoint;

use Tekkl\Shared\Api\Request\MethodCollection;
use Tekkl\Shared\Struct\Struct;
use OpenApi\Annotations as OA;

abstract class Endpoint extends Struct
{
    protected string $url;
    protected MethodCollection $methods;

    final public function __construct() {}

    /**
     * @param array<array-key, mixed> $options
     */
    public static function create(string $url, array $options = []): static
    {
        $endpoint = new static();
        $endpoint->setUrl($url);
        $endpoint->setMethods(new MethodCollection($options['methods'] ?? []));
        return $endpoint;
    }
    abstract public function createOpenApiSchema(): OA\PathItem;


    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Endpoint
    {
        $this->url = $url;
        return $this;
    }

    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }

    public function setMethods(MethodCollection $methods): Endpoint
    {
        $this->methods = $methods;
        return $this;
    }
}