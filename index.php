<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\OutputInterface;

require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

/**
 * @var Application $cli
 */
$cli = $app[Application::class];

$cli->run(null, $app[OutputInterface::class]);
