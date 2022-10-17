<?php

namespace Mixasmix\AuthBundle\Enum;

enum GrantType: string
{
    case AUTHORIZATION_CODE = 'authorization_code';
    case IMPLICIT = 'implict';
    case CLIENT_CREDENTIALS = 'client_credentials';
    case PASSWORD = 'password';
    case REFRESH_TOKEN = 'refresh_token';

    public function isAuthorizationCode(): bool
    {
        return $this === self::AUTHORIZATION_CODE;
    }
    public function isImplict(): bool
    {
        return $this === self::IMPLICIT;
    }

    public function isClientCredentials(): bool
    {
        return $this === self::CLIENT_CREDENTIALS;
    }

    public function isPassword(): bool
    {
        return $this === self::PASSWORD;
    }

    public function isRefreshToken(): bool
    {
        return $this === self::REFRESH_TOKEN;
    }
}
