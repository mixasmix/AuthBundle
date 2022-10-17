<?php

namespace Mixasmix\AuthBundle\Service;

class AuthService
{
    public function __construct(
        string $authClientId,
        string $authClientSecret,
        string $authUrlAuthoruze,
        string $authUrlAccessToken,
        string $authUrlResourcesOwnerDetails,
    ) {
        dd(
        $authClientId,
        $authClientSecret,
        $authUrlAuthoruze,
        $authUrlAccessToken,
        $authUrlResourcesOwnerDetails,
        );
    }
}
