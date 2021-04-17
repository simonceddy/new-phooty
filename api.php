<?php
require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

/**
 * @var Phooty\Kernel
 */
$kernel = $app[Phooty\Kernel::class];

[$match] = $app[Phooty\Support\Factories\MatchFactory::class]->make(1);

$result = $kernel->run($match);

header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
