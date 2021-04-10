<?php
return [
    'name' => 'Phooty',
    'version' => 'beta3jim',

    'plugins' => [
        Phooty\Plugins\RoboDennisPlugin::class,
    ],

    'providers' => [
        Phooty\Plugins\RoboDennis\RoboDennisProvider::class
    ]
];
