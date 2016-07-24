<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class TalksCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    public function configure() {
        $this
            ->setName('talks')
            ->setDescription('Show the talks at the DrupalCamp');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output) {
        $io = new SymfonyStyle($input, $output);

        $io->table(
            ['Title', 'Speaker'],
            [
                ['Drupal VM, Meet Symfony Console', 'Oliver Davies'],
                ['Drupal 8 and the Symfony EventDispatcher', 'Eric Smith'],
                ['Building with APIs', 'Nigel Dunn'],
            ]
        );
    }
}
