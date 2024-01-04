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

final class

Api extends Struct
{
    protected string $name;
    protected string $description;
    protected string $version;

    protected ApplicationRequestEndpointCollection $applicationRequestEndpoints;
    protected PublicDataReadEndpoint $publicDataReadEndpoint;
    protected PublicDataUpsertionEndpoint $publicDataUpsertionEndpoint;
    protected PublicDataDeletionEndpoint $publicDataDeletionEndpoint;
    protected PrivateDataReadEndpoint $privateDataReadEndpoint;
    protected PrivateDataUpsertionEndpoint $privateDataUpsertionEndpoint;
    protected PrivateDataDeletionEndpoint $privateDataDeletionEndpoint;
    protected PublicMediaUploadEndpoint $publicMediaUploadEndpoint;
    protected PublicMediaUpdateEndpoint $publicMediaUpdateEndpoint;
    protected PublicMediaListEndpoint $publicMediaListEndpoint;
    protected PublicMediaDeletionEndpoint $publicMediaDeletionEndpoint;
    protected PrivateMediaUploadEndpoint $privateMediaUploadEndpoint;
    protected PrivateMediaUpdateEndpoint $privateMediaUpdateEndpoint;
    protected PrivateMediaListEndpoint $privateMediaListEndpoint;
    protected PrivateMediaDeletionEndpoint $privateMediaDeletionEndpoint;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getApplicationRequestEndpoints(): ApplicationRequestEndpointCollection
    {
        return $this->applicationRequestEndpoints;
    }

    public function setApplicationRequestEndpoints(ApplicationRequestEndpointCollection $applicationRequestEndpoints): void
    {
        $this->applicationRequestEndpoints = $applicationRequestEndpoints;
    }

    public function getPublicDataReadEndpoint(): PublicDataReadEndpoint
    {
        return $this->publicDataReadEndpoint;
    }

    public function setPublicDataReadEndpoint(PublicDataReadEndpoint $publicDataReadEndpoint): void
    {
        $this->publicDataReadEndpoint = $publicDataReadEndpoint;
    }

    public function getPublicDataUpsertionEndpoint(): PublicDataUpsertionEndpoint
    {
        return $this->publicDataUpsertionEndpoint;
    }

    public function setPublicDataUpsertionEndpoint(PublicDataUpsertionEndpoint $publicDataUpsertionEndpoint): void
    {
        $this->publicDataUpsertionEndpoint = $publicDataUpsertionEndpoint;
    }

    public function getPublicDataDeletionEndpoint(): PublicDataDeletionEndpoint
    {
        return $this->publicDataDeletionEndpoint;
    }

    public function setPublicDataDeletionEndpoint(PublicDataDeletionEndpoint $publicDataDeletionEndpoint): void
    {
        $this->publicDataDeletionEndpoint = $publicDataDeletionEndpoint;
    }

    public function getPrivateDataReadEndpoint(): PrivateDataReadEndpoint
    {
        return $this->privateDataReadEndpoint;
    }

    public function setPrivateDataReadEndpoint(PrivateDataReadEndpoint $privateDataReadEndpoint): void
    {
        $this->privateDataReadEndpoint = $privateDataReadEndpoint;
    }

    public function getPrivateDataUpsertionEndpoint(): PrivateDataUpsertionEndpoint
    {
        return $this->privateDataUpsertionEndpoint;
    }

    public function setPrivateDataUpsertionEndpoint(PrivateDataUpsertionEndpoint $privateDataUpsertionEndpoint): void
    {
        $this->privateDataUpsertionEndpoint = $privateDataUpsertionEndpoint;
    }

    public function getPrivateDataDeletionEndpoint(): PrivateDataDeletionEndpoint
    {
        return $this->privateDataDeletionEndpoint;
    }

    public function setPrivateDataDeletionEndpoint(PrivateDataDeletionEndpoint $privateDataDeletionEndpoint): void
    {
        $this->privateDataDeletionEndpoint = $privateDataDeletionEndpoint;
    }

    public function getPublicMediaUploadEndpoint(): PublicMediaUploadEndpoint
    {
        return $this->publicMediaUploadEndpoint;
    }

    public function setPublicMediaUploadEndpoint(PublicMediaUploadEndpoint $publicMediaUploadEndpoint): void
    {
        $this->publicMediaUploadEndpoint = $publicMediaUploadEndpoint;
    }

    public function getPublicMediaUpdateEndpoint(): PublicMediaUpdateEndpoint
    {
        return $this->publicMediaUpdateEndpoint;
    }

    public function setPublicMediaUpdateEndpoint(PublicMediaUpdateEndpoint $publicMediaUpdateEndpoint): void
    {
        $this->publicMediaUpdateEndpoint = $publicMediaUpdateEndpoint;
    }

    public function getPublicMediaListEndpoint(): PublicMediaListEndpoint
    {
        return $this->publicMediaListEndpoint;
    }

    public function setPublicMediaListEndpoint(PublicMediaListEndpoint $publicMediaListEndpoint): void
    {
        $this->publicMediaListEndpoint = $publicMediaListEndpoint;
    }

    public function getPublicMediaDeletionEndpoint(): PublicMediaDeletionEndpoint
    {
        return $this->publicMediaDeletionEndpoint;
    }

    public function setPublicMediaDeletionEndpoint(PublicMediaDeletionEndpoint $publicMediaDeletionEndpoint): void
    {
        $this->publicMediaDeletionEndpoint = $publicMediaDeletionEndpoint;
    }

    public function getPrivateMediaUploadEndpoint(): PrivateMediaUploadEndpoint
    {
        return $this->privateMediaUploadEndpoint;
    }

    public function setPrivateMediaUploadEndpoint(PrivateMediaUploadEndpoint $privateMediaUploadEndpoint): void
    {
        $this->privateMediaUploadEndpoint = $privateMediaUploadEndpoint;
    }

    public function getPrivateMediaUpdateEndpoint(): PrivateMediaUpdateEndpoint
    {
        return $this->privateMediaUpdateEndpoint;
    }

    public function setPrivateMediaUpdateEndpoint(PrivateMediaUpdateEndpoint $privateMediaUpdateEndpoint): void
    {
        $this->privateMediaUpdateEndpoint = $privateMediaUpdateEndpoint;
    }

    public function getPrivateMediaListEndpoint(): PrivateMediaListEndpoint
    {
        return $this->privateMediaListEndpoint;
    }

    public function setPrivateMediaListEndpoint(PrivateMediaListEndpoint $privateMediaListEndpoint): void
    {
        $this->privateMediaListEndpoint = $privateMediaListEndpoint;
    }

    public function getPrivateMediaDeletionEndpoint(): PrivateMediaDeletionEndpoint
    {
        return $this->privateMediaDeletionEndpoint;
    }

    public function setPrivateMediaDeletionEndpoint(PrivateMediaDeletionEndpoint $privateMediaDeletionEndpoint): void
    {
        $this->privateMediaDeletionEndpoint = $privateMediaDeletionEndpoint;
    }
}