<?php


namespace Despark\SendGridBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('send_grid');

        // @formatter:off
        $rootNode->children()
                    ->scalarNode('api_key')
                        ->isRequired()
                    ->end()
                    ->scalarNode('host')
                        ->defaultNull()
                    ->end()
                    ->arrayNode('curl')
                        ->scalarPrototype()
                    ->end()
                 ->end();
        // @formatter:on

        return $treeBuilder;
    }
}