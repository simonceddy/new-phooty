<?php
namespace Phooty\Util;

/**
 * Razor Ray Chamberlain - except array helpers
 */
class Ray
{
    public static function flatten(iterable $source)
    {
        $result = [];

        foreach ($source as $key => $val) {
            if (is_array($val)) {
                $result = array_merge($result, static::flatten($val));
            } else {
                $result[$key] = $val;
            }
        }

        return $result;
    }
}