<?php
/**
 * @package Plugin
 * @author Joseph Lemoine <j.lemoine@gmail.com>
 */
namespace Jihel\Plugin\DeploymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Joseph Lemoine <j.lemoine@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jihel_plugin_deployment');

        $rootNode
            ->children()
                ->arrayNode('commands')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
