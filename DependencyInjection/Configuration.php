<?php

namespace KMJ\UpdateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kmj_update');
        
        $rootNode->children()
                    ->scalarNode("sync")
                        ->defaultFalse()
                    ->end()
                    ->booleanNode("composershouldupdate")
                        ->defaultFalse()
                    ->end()
                    ->arrayNode("git")
                        ->children()
                            ->scalarNode('remote')
                                ->defaultValue("origin")
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('branch')
                                ->defaultValue('master')
                                ->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end();
                   

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }

}
