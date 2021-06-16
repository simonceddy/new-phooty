<?php
namespace Phooty\Util;

/**
 * A bag of string utils for the big Texan
 */
class Tex
{
    public static function pluralize(string $word)
    {
        if (mb_strrpos(
            mb_strtolower($word), 's'
        ) === mb_strlen($word) - 1) {
            return $word . 'es';
        }
        return $word . 's';
    }
}
