<?php


namespace Steven\RecaptchaBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder('recaptcha');
        $rootNode = $tree->getRootNode();
        $rootNode
            ->children()
                ->scalarNode('key')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('secret')
                    ->cannotBeEmpty()
                    ->isRequired()
            ->end()
        ->end();

        return $tree;
    }
}
