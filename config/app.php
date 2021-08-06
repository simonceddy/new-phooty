<?php
return [
    'name' => 'Phooty',
    'version' => 'beta4mackie',

    'plugins' => [
        Phooty\Plugins\RoboDennisPlugin::class,
    ],

    'providers' => [
        Phooty\Plugins\RoboDennis\RoboDennisProvider::class
    ]
];
