<?php

namespace Mixasmix\AuthBundle\Service;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;
use Mixasmix\AuthBundle\DTO\LinkData;
use Mixasmix\AuthBundle\DTO\UserData;
use Mixasmix\AuthBundle\Enum\AuthorizeResponseType;
use Mixasmix\AuthBundle\Enum\GrantType;
use Mixasmix\AuthBundle\Exception\RequiredParameterEmptyException;

class AuthService
{
    private GenericProvider $provider;

    private ?AccessToken $tokenData = null;

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

    /**
     * @throws RequiredParameterEmptyException
     * @throws IdentityProviderException
     */
    public function getToken(
        GrantType $grant,
        ?string $username = null,
        ?string $password = null,
        ?string $code = null,
        ?string $refreshToken = null,
    ): AccessToken {
        if (is_null($this->tokenData)) {
            $this->tokenData = $this->provider->getAccessToken(
                grant: $grant,
                options: match (true) {
                    $grant->isClientCredentials() => [],
                    $grant->isPassword() => [
                        'username' => $username ?? throw new RequiredParameterEmptyException('Не передано имя пользователя'),
                        'password' => $password ?? throw new RequiredParameterEmptyException('Не передан пароль пользователя'),
                    ],
                    $grant->isAuthorizationCode() => [
                        'code' => $code ?? throw new RequiredParameterEmptyException('Не передан авторизационный код'),
                    ],
                    $grant->isRefreshToken() => [
                        'refresh_token' => $refreshToken ?? throw new RequiredParameterEmptyException('Не передан Refresh Token'),
                    ],
                }
            );
        }

        return $this->tokenData;
    }

    /**
     * @return array<UserData>
     */
    public function getUserData(): array
    {

    }
}
