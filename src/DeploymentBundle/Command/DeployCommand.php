<?php
/**
 * @package Plugin
 * @author Joseph Lemoine <j.lemoine@gmail.com>
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
 */
class DeployCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('jihel:plugin:deploy')
            ->setDescription('Run deployment commands.')
            ->setHelp(<<<EOT
The <info>jihel:plugin:upgrade</info> execute commands under the jihel_plugin_upgrade config.

This command must be used for platform upgrade.

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