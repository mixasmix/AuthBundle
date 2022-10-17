<?php

namespace Mixasmix\AuthBundle\Service;

use League\OAuth2\Client\Provider\GenericProvider;
use Mixasmix\AuthBundle\DTO\LinkData;
use Mixasmix\AuthBundle\Enum\AuthorizeResponseType;

class AuthService
{
    private GenericProvider $provider;

    public function __construct(
        string $authServiceUrl,
        string $authClientId,
        string $authClientSecret,
        string $authUrlAuthorize,
        string $authUrlAccessToken,
        string $authUrlResourcesOwnerDetails,
        string $redirectUrl,
    ) {
        $this->provider = new GenericProvider([
            'clientId' => $authClientId,
            'clientSecret' => $authClientSecret,
            'redirectUri' => $redirectUrl,
            'urlAuthorize' => $authServiceUrl . $authUrlAuthorize,
            'urlAccessToken' => $authServiceUrl . $authUrlAccessToken,
            'urlResourceOwnerDetails' => $authServiceUrl . $authUrlResourcesOwnerDetails,
        ]);
    }

    public function getAuthorizeLink(?AuthorizeResponseType $responseType = null): LinkData
    {
        return new LinkData(
            link: $this->provider->getAuthorizationUrl([
                'response_type' => (
                    is_null($responseType) ?
                    AuthorizeResponseType::CODE :
                    $responseType
                )->value,
            ]),
            state: $this->provider->getState(),
        );
    }
}
