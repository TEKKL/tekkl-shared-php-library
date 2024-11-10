<?php

namespace Tekkl\Shared\Api;

use Tekkl\Shared\Api\Endpoint\ApplicationRequestEndpointCollection;
use Tekkl\Shared\Api\Endpoint\PrivateDataDeletionEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDataReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateDataUpsertionEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateMediaDeletionEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateMediaListEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateMediaUpdateEndpoint;
use Tekkl\Shared\Api\Endpoint\PrivateMediaUploadEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDataDeletionEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDataReadEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicDataUpsertionEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicMediaDeletionEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicMediaListEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicMediaUpdateEndpoint;
use Tekkl\Shared\Api\Endpoint\PublicMediaUploadEndpoint;
use Tekkl\Shared\Struct\Struct;

final class Api extends Struct
{
    protected string $name;
    protected string $description;
    protected string $version;

    protected ApplicationRequestEndpointCollection $applicationRequest;
    protected PublicDataReadEndpoint $publicRead;
    protected PublicDataUpsertionEndpoint $publicUpsert;
    protected PublicDataDeletionEndpoint $publicDelete;
    protected PrivateDataReadEndpoint $privateRead;
    protected PrivateDataUpsertionEndpoint $privateUpsert;
    protected PrivateDataDeletionEndpoint $privateDelete;

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

    public function getPublicRead(): PublicDataReadEndpoint
    {
        return $this->publicRead;
    }

    public function setPublicRead(PublicDataReadEndpoint $publicRead): Api
    {
        $this->publicRead = $publicRead;
        return $this;
    }

    public function getPublicUpsert(): PublicDataUpsertionEndpoint
    {
        return $this->publicUpsert;
    }

    public function setPublicUpsert(PublicDataUpsertionEndpoint $publicUpsert): Api
    {
        $this->publicUpsert = $publicUpsert;
        return $this;
    }

    public function getPublicDelete(): PublicDataDeletionEndpoint
    {
        return $this->publicDelete;
    }

    public function setPublicDelete(PublicDataDeletionEndpoint $publicDelete): Api
    {
        $this->publicDelete = $publicDelete;
        return $this;
    }

    public function getPrivateRead(): PrivateDataReadEndpoint
    {
        return $this->privateRead;
    }

    public function setPrivateRead(PrivateDataReadEndpoint $privateRead): Api
    {
        $this->privateRead = $privateRead;
        return $this;
    }

    public function getPrivateUpsert(): PrivateDataUpsertionEndpoint
    {
        return $this->privateUpsert;
    }

    public function setPrivateUpsert(PrivateDataUpsertionEndpoint $privateUpsert): Api
    {
        $this->privateUpsert = $privateUpsert;
        return $this;
    }

    public function getPrivateDelete(): PrivateDataDeletionEndpoint
    {
        return $this->privateDelete;
    }

    public function setPrivateDelete(PrivateDataDeletionEndpoint $privateDelete): Api
    {
        $this->privateDelete = $privateDelete;
        return $this;
    }
}