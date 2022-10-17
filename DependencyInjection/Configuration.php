<?php

namespace Mixasmix\AuthBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('authorization');

        $rootNode = $builder->getRootNode();
        $rootNode->children()
            ->scalarNode('client_id')
            ->isRequired()
            ->defaultValue('')
            ->end()
            ->end();

        return $builder;
    }
}