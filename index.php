<?php

use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

/**
 * @var Application $cli
 */
$cli = $app[Application::class];

$cli->run();
