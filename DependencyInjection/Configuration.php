<?php
namespace Elnur\BlowfishPasswordEncoderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface,
    Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('elnur_blowfish_password_encoder');

        $rootNode
            ->children()
                ->scalarNode('cost')->defaultValue(15)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
