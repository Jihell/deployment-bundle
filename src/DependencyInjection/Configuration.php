<?php
/**
 * @package deployment-bundle
 */
namespace Jihel\Plugin\DeploymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Joseph Lemoine <lemoine.joseph@gmail.com>
 * @link http://www.joseph-lemoine.fr
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
