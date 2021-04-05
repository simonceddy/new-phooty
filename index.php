<?php

use Phooty\Geometry\FieldDimensions;
use Phooty\Kernel;
use Phooty\MatchConfiguration;
use Phooty\Support\TeamFactory;

require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

$kernel = $app[Kernel::class];

$w = 80;
$l = 110;
$field = new FieldDimensions($w, $l);

[$homeTeam, $awayTeam] = $app[TeamFactory::class]->make(2);

$match = new MatchConfiguration($homeTeam, $awayTeam, $field);

$result = $kernel->run($match);

dd($result->score()->totals());
