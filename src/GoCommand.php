<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class GoCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this
            ->setName('go')
            ->setDescription('Go to a DrupalCamp')
            ->addArgument('name', InputArgument::OPTIONAL, 'Which DrupalCamp?')
            ->addOption(
                'past',
                null,
                InputOption::VALUE_NONE,
                'Has this DrupalCamp already happened?'
            );
    }

  /**
   * {@inheritdoc}
   */
    public function interact(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        if (!$input->getArgument('name')) {
            $input->setArgument('name', $io->ask('Which DrupalCamp?'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $name = $input->getArgument('name');
        $past = $input->getOption('past');

        if ($name) {
            $io->writeln(sprintf($past ? 'Went to %s!' : 'Go to %s!', $name));
        } else {
            $io->writeln($past ? 'Went to a DrupalCamp!' : 'Go to a Drupalcamp!');
        }
    }
}
