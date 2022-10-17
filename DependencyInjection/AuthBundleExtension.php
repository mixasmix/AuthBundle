<?php

namespace Mixasmix\AuthBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class AuthBundleExtension extends Extension
{
    private const BUNDLE_NAME = 'authorization';

    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter(self::BUNDLE_NAME . '.client_id', $config['client_id']);
        $container->setParameter(self::BUNDLE_NAME . '.client_secret', $config['client_secret']);
        $container->setParameter(self::BUNDLE_NAME . '.url_authorize', $config['url_authorize']);
        $container->setParameter(self::BUNDLE_NAME . '.url_access_token', $config['url_access_token']);
        $container->setParameter(self::BUNDLE_NAME . '.url_resource_owner_details', $config['url_resource_owner_details']);
    }
}
