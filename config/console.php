<?php
use Phooty\Console\Commands;

return [
    'commands' => [
        'run' => Commands\RunCommand::class,
        'make:player' => Commands\MakePlayer::class,
        'make:team' => Commands\MakeTeam::class,
        'make:match' => Commands\MakeMatch::class,
    ]
];
