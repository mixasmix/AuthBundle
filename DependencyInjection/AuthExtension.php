<?php

namespace Mixasmix\AuthBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AuthExtension extends Extension
{
    private const ALIAS = 'auth';

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.yaml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter(self::ALIAS . '.service_url', $config['service_url']);
        $container->setParameter(self::ALIAS . '.client_id', $config['client_id']);
        $container->setParameter(self::ALIAS . '.client_secret', $config['client_secret']);
        $container->setParameter(self::ALIAS . '.url_authorize', $config['url_authorize']);
        $container->setParameter(self::ALIAS . '.url_access_token', $config['url_access_token']);
        $container->setParameter(self::ALIAS . '.url_resource_owner_details', $config['url_resource_owner_details']);
        $container->setParameter(self::ALIAS . '.redirect_uri', $config['redirect_uri']);
    }

    public function getAlias(): string
    {
        return self::ALIAS;
    }
}
