<?php

if (!function_exists('projectRoot')) {
    function projectRoot()
    {
        $current = dirname(__DIR__);

        while ((!file_exists($current . '/composer.json')
            || !file_exists($current . '/vendor/autoload.php'))
            && $current !== ($next = dirname($current))
        ) {
            $current = $next;
        }

        return $current;
    }
}
