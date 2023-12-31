<?php

namespace Tekkl\Shared\Security\AccessToken;

interface AccessTokenInterface
{
    public const PARAM_ACCESS_TOKEN = 'X-ContentApp-Access-Token';
    public const PARAM_CONTENT_APP_VIEW = 'X-ContentApp-View';
    public function getUserId(): ?string;
    public function getContentItemId(): string;
    public function getView(): string;
}