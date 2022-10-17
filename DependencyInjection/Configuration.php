<?php

namespace Mixasmix\AuthorizationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('auth');

        $rootNode = $builder->getRootNode();
        $rootNode->children()
            ->scalarNode('url')
            ->isRequired()
            ->defaultValue('')
            ->end()
            ->end();

        return $builder;
    }
}
