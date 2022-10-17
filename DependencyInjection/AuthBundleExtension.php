<?php

namespace Mixasmix\AuthorizationBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class AuthorizationBundleExtension extends Extension
{
    private const BUNDLE_NAME = 'auth';

    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter(self::BUNDLE_NAME . '.url', $config['url']);}
}
