<?php

namespace Mixasmix\AuthBundle;

use Mixasmix\AuthBundle\DependencyInjection\AuthExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AuthBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new AuthExtension();
    }
}
