<?php

namespace Mixasmix\AuthBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class AuthExtension extends Extension
{
    private const ALIAS = 'auth';

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        dd($configs);
    }

    public function getAlias(): string
    {
        return self::ALIAS;
    }
}
