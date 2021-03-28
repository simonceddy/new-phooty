<?php

use Phooty\Entities\Position;
use Phooty\Geometry\PlayingField;
use Phooty\MatchConfiguration;
use Phooty\Support\AssignPositions;
use Phooty\Support\CSVData;
use Phooty\Support\FootyFaker;
use Phooty\Support\PlayerFactory;
use Phooty\Support\SetField;
use Phooty\Support\TeamFactory;

require 'vendor/autoload.php';

$kernel = Phooty\Factory::create();
$config = $kernel->config();

$footyFaker = new FootyFaker(new CSVData());
$playerFactory = new PlayerFactory(
    $footyFaker,
    new AssignPositions($config['players.positions'])
);
$teamFactory = new TeamFactory($footyFaker, $playerFactory);

$w = 80;
$l = 110;
$field = new PlayingField($w, $l);

[$homeTeam, $awayTeam] = $teamFactory->make(2);

$match = new MatchConfiguration($homeTeam, $awayTeam, $field);

$setField = new SetField(
    $config['players.positions'],
    $config['players.matchUps']
);

$setField->prepare($match);

dd($match->field());

$kernel->run($match);

dd($kernel);
