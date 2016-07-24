<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application('DrupalCamps', '1.0');

$application->add(new GoCommand());
$application->add(new TalksCommand());

$application->run();
