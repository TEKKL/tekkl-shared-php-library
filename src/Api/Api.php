<?php

namespace Tekkl\Shared\Api;

use Tekkl\Shared\Struct\Struct;
use Tekkl\Shared\Api\Endpoint\ApplicationRequestEndpointCollection;
use Tekkl\Shared\Api\Endpoint\PublicReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicWriteEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDeleteEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateWriteEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDeleteEndpoint;

final class Api extends Struct
{
    protected string $name;
    protected string $description;
    protected string $version;

    protected ApplicationRequestEndpointCollection $applicationRequest;
    protected PublicReadEndpoint $publicRead;
    protected PublicWriteEndpoint $publicWrite;
    protected PublicDeleteEndpoint $publicDelete;
    protected PrivateReadEndpoint $privateRead;
    protected PrivateWriteEndpoint $privateWrite;
    protected PrivateDeleteEndpoint $privateDelete;

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

    public function getPublicRead(): PublicReadEndpoint
    {
        return $this->publicRead;
    }

    public function setPublicRead(PublicReadEndpoint $publicRead): Api
    {
        $this->publicRead = $publicRead;
        return $this;
    }

    public function getPublicWrite(): PublicWriteEndpoint
    {
        return $this->publicWrite;
    }

    public function setPublicWrite(PublicWriteEndpoint $publicWrite): Api
    {
        $this->publicWrite = $publicWrite;
        return $this;
    }

    public function getPublicDelete(): PublicDeleteEndpoint
    {
        return $this->publicDelete;
    }

    public function setPublicDelete(PublicDeleteEndpoint $publicDelete): Api
    {
        $this->publicDelete = $publicDelete;
        return $this;
    }

    public function getPrivateRead(): PrivateReadEndpoint
    {
        return $this->privateRead;
    }

    public function setPrivateRead(PrivateReadEndpoint $privateRead): Api
    {
        $this->privateRead = $privateRead;
        return $this;
    }

    public function getPrivateWrite(): PrivateWriteEndpoint
    {
        return $this->privateWrite;
    }

    public function setPrivateWrite(PrivateWriteEndpoint $privateWrite): Api
    {
        $this->privateWrite = $privateWrite;
        return $this;
    }

    public function getPrivateDelete(): PrivateDeleteEndpoint
    {
        return $this->privateDelete;
    }

    public function setPrivateDelete(PrivateDeleteEndpoint $privateDelete): Api
    {
        $this->privateDelete = $privateDelete;
        return $this;
    }
}