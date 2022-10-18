<?php

namespace Mixasmix\AuthBundle\Controller;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Mixasmix\AuthBundle\Enum\GrantType;
use Mixasmix\AuthBundle\Exception\RequiredParameterEmptyException;
use Mixasmix\AuthBundle\Service\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthorizationController extends AbstractController
{
    public function __construct(
        private readonly AuthService $authService,
    ) {
    }

    #[Route(path: '/link', name: 'auth_get_link', methods: ['GET'])]
    public function getLink(): JsonResponse
    {
        return $this->json($this->authService->getAuthorizeLink());
    }

    /**
     * @throws RequiredParameterEmptyException
     * @throws IdentityProviderException
     */
    #[Route(path: '/auth/{code}', name: 'auth_get_token', methods: ['GET'])]
    public function getTokenByAuthCode(string $code): JsonResponse
    {
        return $this->json(
            $this->authService->getToken(
                grant: GrantType::AUTHORIZATION_CODE,
                code: $code,
            ),
        );
    }
}
