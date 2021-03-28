<?php
return [
    'positions' => [
        // Full back line
        [
            'LBP' => null, // left back pocket
            'FB' => null, // full back
            'RBP' => null, // right back pocket
        ],
        // Half back line
        [
            'LBF' => null, // left back flank
            'CHB' => null, // center half back
            'RBF' => null, // right back flank
        ],
        // Wings and center
        [
            'LW' => null, // left wing
            'C' => null, // center
            'RW' => null, // right wing
        ],
        // Half forward line
        [
            'LHF' => null, // left half forward
            'CHF' => null, // center half forward
            'RHF' => null, // right half forward
        ], 
        // Full forward line
        [
            'LFP' => null, // left forward pocket
            'FF' => null, // full foward
            'RFP' => null, // right forward pocket
        ],
        // Midfield - last to handle positioning
        // TODO make less brittle
        [
            'RU' => fn($width, $length) => [$width / 2, $length / 2], // ruck
            'RO' => fn($width, $length) => [($width / 2) - 2, $length / 2], // rover
            'RR' => fn($width, $length) => [($width / 2) + 2, $length / 2], // ruck-rover
        ], 
    ],

    'matchUps' => [
        'LBP' => 'RFP',
        'FB' => 'FF',
        'RBP' => 'LFP',
        'LBF' => 'RHF',
        'CHB' => 'CHF',
        'RBF' => 'LHF',
        'LW' => 'RW',
        'C' => 'C',
        'RW' => 'LW',
        'LHF' => 'RBF',
        'CHF' => 'CHB',
        'RHF' => 'LBF',
        'LFP' => 'RBP',
        'FF' => 'FB',
        'RFP' => 'LBP',
        'RU' => 'RU',
        'RO' => 'RO',
        'RR' => 'RR',
    ],
];
