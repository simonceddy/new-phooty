<?php
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\OutputInterface;

require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

// dd(\Phooty\Support\InitialSetup::hasBeenRun());
// dd($app[\Doctrine\Common\Cache\Cache::class]);
// dd(file_exists($app[Phooty\Support\PhootyDir::class]));

/**
 * @var Application $cli
 */
$cli = $app[Application::class];

$cli->run(null, $app[OutputInterface::class]);
