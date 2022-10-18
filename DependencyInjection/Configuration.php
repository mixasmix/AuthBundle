<?php

namespace Mixasmix\AuthBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder('auth');

        $rootNode = $builder->getRootNode();

        $rootNode->children()
            ->scalarNode('server_url')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('client_id')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('client_secret')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('redirect_uri')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('url_authorize')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('url_access_token')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->scalarNode('url_resource_owner_details')
                ->isRequired()
                ->defaultValue('')
                ->end()
            ->end();

        return $builder;
    }
}
