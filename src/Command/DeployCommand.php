<?php
/**
 * @package deployment-bundle
 */
namespace Jihel\Plugin\DeploymentBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DeployCommand
 *
 * Provide easy deployment interface
 *
 * @author Joseph Lemoine <j.lemoine@gmail.com>
 * @link http://www.joseph-lemoine.fr
 */
class DeployCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('jihel:deploy')
            ->setDescription('Run deployment commands.')
            ->setHelp(<<<EOT
The <info>jihel:deploy</info> execute commands under the jihel_plugin_deploy config.

This command must be used for platform deployment.

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commands = $this->getContainer()->getParameter('lts.plugin.deployment.commands');

        if (count($commands)) {
            foreach ($commands as $command) {
                $output->writeln(sprintf('Execute command <comment>%s</comment>', $command));
                passthru($command);
            }
        } else {
            $output->writeln('No command found !');
        }

        $output->writeln('<info>Deployment done !</info>');
    }
}
