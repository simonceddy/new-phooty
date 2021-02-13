<?php
namespace Phooty\Support;

final class DefaultConfig
{
    public static function all()
    {
        return [
            'core' => [
                'totalPeriods' => 4,
                'periodLength' => 120000,
            ]
        ];
    }
}
