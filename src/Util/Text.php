<?php
namespace Phooty\Util;

class Text
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
