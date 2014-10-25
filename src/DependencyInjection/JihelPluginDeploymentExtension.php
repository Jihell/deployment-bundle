<?php
/**
 * @package deployment-bundle
 */
namespace Jihel\Plugin\DeploymentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class JihelPluginDeploymentExtension
 * 
 * @author Joseph Lemoine <j.lemoine@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
class JihelPluginDeploymentExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('jihel.plugin.deployment.commands', $config['commands']);
    }
}
