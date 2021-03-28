<?php

use Phooty\Config;
use Phooty\Geometry\PlayingField;
use Phooty\Kernel;
use Phooty\MatchConfiguration;
use Phooty\Support\CSVData;
use Phooty\Support\FootyFaker;
use Phooty\Support\PlayerFactory;
use Phooty\Support\SetField;
use Phooty\Support\TeamFactory;

require 'vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

$kernel = $app[Kernel::class];
$footyFaker = new FootyFaker(new CSVData());
$playerFactory = new PlayerFactory($footyFaker);
$teamFactory = new TeamFactory(
    $footyFaker,
    $playerFactory,
    $app[Config::class]['players.positions']
);

$w = 80;
$l = 110;
$field = new PlayingField($w, $l);

[$homeTeam, $awayTeam] = $teamFactory->make(2);

$match = new MatchConfiguration($homeTeam, $awayTeam, $field);

$setField = new SetField(
    $app[Config::class]['players.positions'],
    $app[Config::class]['players.matchUps']
);

$setField->prepare($match);

$kernel->run($match);

dd($kernel);
