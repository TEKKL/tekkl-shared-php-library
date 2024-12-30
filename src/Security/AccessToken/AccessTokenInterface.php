<?php

namespace Tekkl\Shared\Security\AccessToken;

interface AccessTokenInterface
{
    public const PARAM_ACCESS_TOKEN = 'X-Application-Access-Token';
    public const PARAM_APPLICATION_VIEW = 'X-Application-View';
    public function getUserId(): ?string;
    public function getElementId(): string;
    public function getView(): ?string;
}